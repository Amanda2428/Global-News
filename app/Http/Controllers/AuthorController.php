<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\View\View;

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

    public function update(Request $request)
    {

        $id = $request->input('id');
        $author = Author::findOrFail($id);
        // Update the author's fields

        $data =[
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'bio' => $request->input('bio'),
            'address' => $request->input('address')
        ];
    
        // $author->name = $request->input('name');
        // $author->bio = $request->input('bio');
        // $author->phone = $request->input('phone');
        // $author->email = $request->input('email');
        // $author->address = $request->input('address');
    
        // Handle profile image if uploaded
        if ($request->hasFile('profile')) {
            // Delete the old image if it exists
            if ($author->image && file_exists(public_path('images/' . $author->image))) {
                unlink(public_path('images/' . $author->image));
            }
    
            // Save the new image
            $file = $request->file('profile');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['profile'] = $filename;
        }
        else{
            $data['profile'] = $author->profile;
        }
    
        $author->update($data);
    
        return redirect()->back();
    }
    
    
}
