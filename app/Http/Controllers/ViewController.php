<?php

namespace App\Http\Controllers;
use App\Models\View as ViewModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;

class ViewController extends Controller
{

    public function goToViews(): View
    {
        // Retrieve all views with user and category data
        $views = ViewModel::with(['user', 'category'])->get();
        

        // Pass the data to the view
        return view('admin.view', compact('views'));
    }
}
