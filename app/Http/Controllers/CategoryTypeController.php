<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use App\Models\CategoryType;

use Illuminate\Http\Request;

class CategoryTypeController extends Controller
{
    public function goToCategoryTypes(): View
    {
        $category_types= CategoryType::all();
        return view('admin.category-types', compact('category_types'));
    }
}
