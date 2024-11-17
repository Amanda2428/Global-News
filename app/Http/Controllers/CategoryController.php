<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
   
    public function goToWorldPage($id): View
    {
        $categories = Category::where('category_type_id', '=', $id)->get();
        return view('admin.world', compact('categories'));
    }

    public function goToSportPage($id): View
    {
        $categories = Category::where('category_type_id', '=', $id)->get();
        return view('admin.sport', compact('categories'));
    }

    public function goToBusinessPage($id): View
    {
        $categories = Category::where('category_type_id', '=', $id)->get();
        return view('admin.business', compact('categories'));
    }

    public function goToEducationPage($id): View
    {
        $categories = Category::where('category_type_id', '=', $id)->get();
        return view('admin.education', compact('categories'));
    }

    public function goToEntertainmentPage($id): View
    {
        $categories = Category::where('category_type_id', '=', $id)->get();
        return view('admin.entertainment', compact('categories'));
    }
}
