<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Redirect;

class AuthorController extends Controller
{
    public function goToAuthorList(): View
    {
        $authors = Author::paginate(5);
        return view('admin.author-list', compact('authors'));
    }

    public function store(Request $request)
    {
        // Get all other data except the image
        $data = $request->only(['name', 'email', 'phone', 'bio', 'address']);
    
        // Check if the image (profile picture) is uploaded
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $filename = time() . '.' . $file->getClientOriginalExtension();
    
            // Move the file to the 'images' folder
            $file->move(public_path('images'), $filename);
    
            // Add the image filename to the data array
            $data['profile'] = $filename;
        }
    
        // Create a new author
        Author::create($data);
    
        // Get the current page number from the query string, defaulting to 1
        $page = $request->get('page', 1);
    
        // Paginate the authors (assuming you want 5 authors per page)
        $authors = Author::paginate(5);
    
        // Return the view with the paginated authors and preserve the page parameter
        return redirect()->route('admin.goToAuthorList', ['page' => $page])->with('success', 'Author added successfully!');
    }
    
    
    

    public function update(Request $request): RedirectResponse
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email,' . $request->id,
            'bio' => 'required|string|max:150',
            'phone' => 'required|regex:/^\+?[0-9]{1,15}$/',
            'address' => 'required|string',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image upload
        ]);
    
        // Find the author by ID
        $author = Author::findOrFail($request->id);
    
        // Update other fields
        $author->name = $request->input('name');
        $author->bio = $request->input('bio');
        $author->phone = $request->input('phone');
        $author->email = $request->input('email');
        $author->address = $request->input('address');
    
        // Handle profile image if uploaded
        if ($request->hasFile('profile')) {
            // Delete the old image if it exists
            if ($author->profile && file_exists(public_path('images/' . $author->profile))) {
                unlink(public_path('images/' . $author->profile));
            }
    
            // Save the new image
            $file = $request->file('profile');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $author->profile = $filename;  // Save only the filename in the database
        }
    
        // Save the changes to the author record
        $author->save();
    
        return redirect()->route('admin.goToAuthorList')->with('success', 'Author data updated successfully!');
    }
    
    
        public function destroy($id)
    {
        // Find the author by ID and delete
        $author = Author::findOrFail($id);
        $author->delete();
    
        return redirect()->route('admin.goToAuthorList')->with('success', 'Author deleted successfully.');
    }
    public function AuthorPagesearch(Request $request)
    {
        $query = $request->input('query'); 
        $authors= Author::where('email', 'LIKE', "%$query%")->paginate(5);
        return view('admin.author-list', compact( 'query','authors'));
    }

// for author details
public function goToAuthorPage($authorId)
{
    // Fetch the author along with their categories
    $author = Author::with('categories')->findOrFail($authorId);

    // Pass the author and categories to the view
    return view('user.author-detail', compact('author'));
}
public function getAuthorsCategoryStats()
{
    $data = Author::with(['categories.categoryType'])
        ->get()
        ->map(function ($author) {
            return [
                'author' => $author->name,
                'category_counts' => $author->categories
                    ->groupBy(fn($category) => $category->categoryType->name)
                    ->map->count(),
            ];
        });

    return response()->json($data);
}



    
    
    
    
    
  
    
    
    
}
