<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function goToViews(): View
    {
        return view('admin.view');
    }
}
