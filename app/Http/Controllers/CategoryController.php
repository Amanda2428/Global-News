<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Author;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{

    public function goToWorldPage($id): View
    {
        $categories = Category::where('category_type_id', '=', $id)->with('author')->get();
        $authors = Author::get();   
        return view('admin.world', compact('categories', 'authors'));
    }

    public function goToSportPage($id): View
    {
        $categories = Category::where('category_type_id', '=', $id)->with('author')->get();
        $authors=Author::get(); 
        return view('admin.sport', compact('categories','authors'));
    }

    public function goToBusinessPage($id): View
    {
        $categories = Category::where('category_type_id', '=', $id)->with('author')->get();
        $authors=Author::get();
        return view('admin.business', compact('categories','authors'));
    }

    public function goToEducationPage($id): View
    {
        $categories = Category::where('category_type_id', '=', $id)->with('author')->get();
        $authors=Author::get();
        return view('admin.education', compact('categories','authors'));
    }

    public function goToEntertainmentPage($id): View
    {
        $categories = Category::where('category_type_id', '=', $id)->with('author')->get();
        $authors=Author::get();
        return view('admin.entertainment', compact('categories','authors'));
    }


    public function store(Request $request, $id): RedirectResponse
    {

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'social_media_link' => $request->social_media_link,
            'category_type_id' => $id,
            'author_id' => $request->author_id
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['image'] = $filename;
        }
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('videos'), $filename);
            $data['video'] = $filename;
        }

        $category = Category::create($data);    
        if ($id == 1) {
            return redirect()->route('admin.goToWorldPage', ['id' => 1]);
        } else if ($id == 2) {
            return redirect()->route('admin.goToSportPage', ['id' => 2]);
        } else if ($id == 3) {
            return redirect()->route('admin.goToBusinessPage', ['id' => 3]);
        } else if ($id == 4) {
            return redirect()->route('admin.goToEducationPage', ['id' => 4]);
        } else {
            return redirect()->route('admin.goToEntertainmentPage', ['id' => 5]);
        }
    }

    public function destroy(Request $request, $id): RedirectResponse
    {
        $category_id = $request->query('category_id');
        $category = Category::find($category_id);
        $category->delete();
        if ($id == 1) {
            return redirect()->route('admin.goToWorldPage', ['id' => 1]);
        } else if ($id == 2) {
            return redirect()->route('admin.goToSportPage', ['id' => 2]);
        } else if ($id == 3) {
            return redirect()->route('admin.goToBusinessPage', ['id' => 3]);
        } else if ($id == 4) {
            return redirect()->route('admin.goToEducationPage', ['id' => 4]);
        } else {
            return redirect()->route('admin.goToEntertainmentPage', ['id' => 5]);
        }
    }

    public function update(Request $request): RedirectResponse
{
    $id = $request->input('id');
    $category = Category::findOrFail($id);
    

    // Update basic fields
    $category->title = $request->input('title');
    $category->description = $request->input('description');
    $category->social_media_link = $request->input('social_media_link');
    $category->author_id = $request->input('author_id');

    // Handle image upload  
    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if ($category->image && file_exists(public_path('images/' . $category->image))) {
            unlink(public_path('images/' . $category->image));
        }
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $filename);
        $category->image = $filename;
    }

    // Handle video upload
    if ($request->hasFile('video')) {
        // Delete old video if it exists
        if ($category->video && file_exists(public_path('videos/' . $category->video))) {
            unlink(public_path('videos/' . $category->video));
        }
        $file = $request->file('video');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('videos'), $filename);
        $category->video = $filename;
    }

    // Save updated category
    $category->save();

    return redirect()->back();
}


//searching function for all categories
public function WorldPagesearch(Request $request, $id)
{
    $query = $request->input('query'); // Get the search query
    

    // Fetch categories where the title matches or author name matches
    // $categories = Category::with('author')->where('title', 'LIKE', "%$query%")->get(); 
    $categories = Category::where('title', 'LIKE', "%$query%")->get();
        
    $authors = Author::get();   

    // Pass the results and the query back to the view
    return view('admin.world', compact('categories', 'query','authors'));
}
public function SportPagesearch(Request $request, $id)
{
    $query = $request->input('query'); 
    $categories = Category::where('title', 'LIKE', "%$query%")->get();
    $authors = Author::get();
    return view('admin.sport', compact('categories', 'query','authors'));
}

public function BusinessPagesearch(Request $request, $id)
{
    $query = $request->input('query'); 
    $categories = Category::where('title', 'LIKE', "%$query%")->get();
    $authors = Author::get();
    return view('admin.business', compact('categories', 'query','authors'));
}
public function EntertainmentPagesearch(Request $request, $id)
{
    $query = $request->input('query'); 
    $categories = Category::where('title', 'LIKE', "%$query%")->get();
    $authors = Author::get();
    return view('admin.entertainment', compact('categories', 'query','authors'));
}
public function EducationPagesearch(Request $request, $id)
{
    $query = $request->input('query'); 
    $categories = Category::where('title', 'LIKE', "%$query%")->get();
    $authors = Author::get();
    return view('admin.education', compact('categories', 'query','authors'));
}










    
}
