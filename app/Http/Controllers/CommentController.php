<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function userComment(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'comment' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Create and insert the comment into the database
        $comment = new Comment();
        $comment->description = $validated['comment'];
        $comment->user_id = Auth::id();
        $comment->category_id = $validated['category_id'];
        $comment->save();


        return redirect()->back()->with('success', 'Comment added successfully!');
    }
    public function updateCommentUser(Request $request, $id)
    {
        $validated = $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->description = $validated['comment'];
        $comment->save();
        return redirect()->back()->with('status', 'Comment updated successfully!');

    }


    public function destroyCommentUser($id)
    {
        // Find the comment by ID
        $comment = Comment::findOrFail($id);
        if ($comment->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
        }

        // Delete the comment
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }

    public function goToComments(): View
    {
        $comments = Comment::with('category', 'user')->paginate(5);
        $categories = Category::all();
        $users = User::all();
        return view('admin.comment', compact('comments', 'categories', 'users'));
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
            $q->where('name', 'LIKE', "%$query%")
                ->orWhere('email', 'LIKE', "%$query%");
        })->with(['user', 'category'])->paginate(5);

        return view('admin.comment', compact('comments', 'query'));
    }
}
