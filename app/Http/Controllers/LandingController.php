<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\View as ViewModel;
use Illuminate\Support\Facades\Auth;
use App\Models\CategoryType;

class LandingController extends Controller
{
        public function goToLandingPage()
        {



                $latestPost = Category::where('category_type_id', 1)
                        ->with('author')
                        ->latest('created_at')
                        ->first();

                $postsByCategoryType1 = Category::where('category_type_id', 1)
                        ->with('author')
                        ->latest('created_at')
                        ->skip(1)
                        ->take(6)
                        ->get();

                $latestPostsByCategories = Category::whereIn('category_type_id', [2, 3, 4, 5])
                        ->with('author')
                        ->latest('created_at')
                        ->take(4)
                        ->get();

                $categoriesType2Posts = Category::where('category_type_id', 2)
                        ->with('author')
                        ->latest('created_at')
                        ->take(4)
                        ->get();

                $categoryType3Posts = Category::where('category_type_id', 3)
                        ->with('author')
                        ->latest('created_at')
                        ->take(8)
                        ->get();

                $latestCategoryType4Post = Category::where('category_type_id', 4)
                        ->with('author')
                        ->latest('created_at')
                        ->first();
                $categoryType4Posts = Category::where('category_type_id', 4)
                        ->with('author')
                        ->latest('created_at')
                        ->skip(1) // Skipping the first post (latest one already fetched)
                        ->take(6)
                        ->get();
                $popularPostsFor4 = Category::withCount('views')
                        ->where('category_type_id', 4)
                        ->orderBy('views_count', 'desc')
                        ->limit(5)
                        ->get();
                $popularPostsFor5 = Category::withCount('views')
                        ->where('category_type_id', 5)
                        ->orderBy('views_count', 'desc')
                        ->limit(5)
                        ->get();
                $latestCategoryType5Post = Category::where('category_type_id', 5)
                        ->with('author')
                        ->latest('created_at')
                        ->first();

                $categoryType5Posts = Category::where('category_type_id', 5)
                        ->with('author')
                        ->latest('created_at')
                        ->skip(1)
                        ->take(6)
                        ->get();
                return view('landing', compact('latestPost', 'postsByCategoryType1', 'latestPostsByCategories', 'categoriesType2Posts', 'categoryType3Posts', 'latestCategoryType4Post', 'categoryType4Posts', 'popularPostsFor4', 'popularPostsFor5', 'latestCategoryType5Post', 'categoryType5Posts'));
        }
        public function categoryAnalytics()
        {
                // Most-viewed categories
                $mostViewedCategories = Category::withCount('views')
                        ->orderByDesc('views_count')
                        ->take(5)
                        ->get(['id', 'title', 'views_count']);

                // Categories with the most comments
                $mostCommentedCategories = Category::withCount('comments')
                        ->orderByDesc('comments_count')
                        ->take(5)
                        ->get(['id', 'title', 'comments_count']);

                // Categories count per category type
                $categoriesPerType = CategoryType::withCount('categories')
                        ->get(['id', 'name', 'categories_count']);

                return response()->json([
                        'mostViewedCategories' => $mostViewedCategories,
                        'mostCommentedCategories' => $mostCommentedCategories,
                        'categoriesPerType' => $categoriesPerType,
                ]);
        }
        // CategoryController.php
        public function searchResult(Request $request)
        {
                $query = $request->input('query');
                $categories = Category::where('title', 'like', '%' . $query . '%')->get();

                // Optionally, you can add pagination or limit the results
                return view('user.detail', compact('categories'));
        }
        public function goToAnalysisPage()
        {
                return view('admin.analysis');
        }
}
