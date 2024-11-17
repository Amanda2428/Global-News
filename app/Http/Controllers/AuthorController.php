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
}
