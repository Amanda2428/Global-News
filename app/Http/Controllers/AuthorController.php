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
        $authors = Author::get();
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

            $file->move(public_path('images'), $filename);

            $data['profile'] = 'images/' . $filename;
        }

        $author = Author::create($data);

        $authors = Author::all();

        return view('admin.author-list', compact('authors'));
    }


    public function update(Request $request): RedirectResponse
    {
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
            $author->profile = $filename;  // Update the profile field
        }
    
        // Save the changes to the author record
        $author->save();
    
        // Redirect back with success message
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
        $authors= Author::where('email', 'LIKE', "%$query%")->get();
        return view('admin.author-list', compact( 'query','authors'));
    }

// In your controller
// In your controller method
public function goToAuthorPage($authorId)
{
    // Fetch the author along with their categories
    $author = Author::with('categories')->findOrFail($authorId);

    // Pass the author and categories to the view
    return view('user.author-detail', compact('author'));
}


    
    
    
    
    
  
    
    
    
}
