<?php

namespace App\Http\Controllers;

use App\Models\View as ViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class ViewController extends Controller
{
    /**
     * Display a listing of view counts grouped by user and category.
     *
     * @return View
     */
    public function goToViews(): View
    {
        $categoryViewCounts = ViewModel::join('categories', 'views.category_id', '=', 'categories.id')  // Join with the categories table to get category titles
            ->select('views.user_id', 'views.category_id', DB::raw('COUNT(*) as total_views'), 'categories.title as category_title')
            ->groupBy('views.user_id', 'views.category_id', 'categories.title')
            ->get();

        return view('admin.view', compact('categoryViewCounts'));
    }


    /**
     * Search for views based on user email.
     *
     * @param Request $request
     * @return View
     */

    public function viewSearch(Request $request)
    {
        $query = $request->input('query');

        // If there is a query, filter by category title, user name, or user email
        if ($query) {
            $categoryViewCounts = ViewModel::join('categories', 'views.category_id', '=', 'categories.id')
                ->join('users', 'views.user_id', '=', 'users.id') // Join with the users table to get user info
                ->where('categories.title', 'LIKE', "%{$query}%")
                ->orWhere('users.name', 'LIKE', "%{$query}%")
                ->orWhere('users.email', 'LIKE', "%{$query}%")
                ->select('views.user_id', 'views.category_id', DB::raw('COUNT(*) as total_views'), 'categories.title as category_title', 'users.name', 'users.email')
                ->groupBy('views.user_id', 'views.category_id', 'categories.title', 'users.name', 'users.email')
                ->get();
        } else {
            // If no query is entered, fetch all records
            $categoryViewCounts = ViewModel::join('categories', 'views.category_id', '=', 'categories.id')
                ->select('views.user_id', 'views.category_id', DB::raw('COUNT(*) as total_views'), 'categories.title as category_title')
                ->groupBy('views.user_id', 'views.category_id', 'categories.title')
                ->get();
        }

        // Pass the filtered or all data to the view
        return view('admin.view', compact('categoryViewCounts', 'query'));
    }
}
