<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\CategoryType;
use Illuminate\Http\RedirectResponse;


use Illuminate\Http\Request;

class CategoryTypeController extends Controller
{
    public function goToCategoryTypes(): View
    {
        $category_types = CategoryType::all();
        return view('admin.category-types', compact('category_types'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = [
            'name' => $request->input('category-type-name')
        ];

        CategoryType::create($data);

        return redirect()->route('admin.goToCategoryTypes');
    }
    public function update(Request $request): RedirectResponse
    {
        // Validate the input
        $request->validate([
            'id' => 'required|exists:category_types,id',
            'category-type-name' => 'required|string|max:255'
        ]);

        // Find the category type by ID
        $categoryType = CategoryType::findOrFail($request->id);

        // Update the category type with new data
        $categoryType->name = $request->input('category-type-name');
        $categoryType->save();

        // Redirect back to the category types listing page
        return redirect()->route('admin.goToCategoryTypes')->with('success', 'Category type updated successfully!');
    }


    public function destroy($id)
    {
        // Find the category type by ID and delete
        $categoryType = CategoryType::findOrFail($id);
        $categoryType->delete();

        // Redirect back with a success message
        return redirect()->route('admin.goToCategoryTypes')->with('success', 'Category type deleted successfully.');
    }

    public function CategoryTypePagesearch(Request $request)
    {
        $query = $request->input('query'); // Get the search query

        $category_types = CategoryType::where('name', 'LIKE', "%$query%")->get();


        // Pass the results and the query back to the view
        return view('admin.category-types', compact('category_types', 'query'));
    }
}
