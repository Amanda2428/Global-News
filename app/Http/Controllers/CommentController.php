<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{
    public function goToComments(): View
    {
        $comments = Comment::with('category', 'user')->get(); 
        $categories = Category::all();
        $users =User::all();
        return view('admin.comment', compact('comments','categories','users'));
    }
    public function destroy($id)
    {
        // Find the author by ID and delete
        $comments = Comment::findOrFail($id);
        $comments->delete();
    
        return redirect()->route('admin.goToComments')->with('success', 'Comment deleted successfully.');
    }
    public function CommentsPagesearch(Request $request)
    {
        $query = $request->input('query');
    
        $comments = Comment::whereHas('user', function ($q) use ($query) {
            $q->where('name', 'LIKE', "%$query%");
        })->with(['user', 'category'])->get();
    
        return view('admin.comment', compact('comments', 'query'));
    }
    

}
