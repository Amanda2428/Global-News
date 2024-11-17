<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function goToComments(): View
    {
        return view('admin.comment');
    }
}
