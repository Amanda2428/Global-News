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
        // Validate the phone number uniqueness before proceeding
        $request->validate([
            'phone' => 'unique:authors,phone', // Ensures the phone number is unique in the authors table
        ]);
    
        // Get all other data except the image
        $data = $request->only(['name', 'email', 'phone', 'bio', 'address']);
    
        // Check if the image (profile picture) is uploaded
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            
            // Move the image to the public 'images' directory
            $file->move(public_path('images'), $filename);
            
            // Store the image path in the 'profile' field
            $data['profile'] = 'images/' . $filename;
        }
    
        // Create a new author record with or without the profile image
        $author = Author::create($data);
    
        // Get all authors to pass to the view
        $authors = Author::all();
        
        // Return the view with the authors data
        return view('admin.author-list', compact('authors'));
    }
    

}
