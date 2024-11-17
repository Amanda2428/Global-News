<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Author;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{

    public function goToWorldPage($id): View
    {
        $categories = Category::where('category_type_id', '=', $id)->with('author')->get();
        $authors = Author::get();
        return view('admin.world', compact('categories', 'authors'));
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


    public function store(Request $request, $id): RedirectResponse
    {

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'social_media_link' => $request->social_media_link,
            'category_type_id' => $id,
            'author_id' => $request->author_id
        ];

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['image'] = $filename;
        }
        if($request->hasFile('video')) {
            $file = $request->file('video');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('videos'), $filename);
            $data['video'] = $filename;
        }

        $category = Category::create($data);
        if($id == 1) {
            return redirect()->route('admin.goToWorldPage', ['id' => 1]);
        } else if($id == 2) {
            return redirect()->route('admin.goToSportPage', ['id' => 2]);
        } else if($id == 3) {
            return redirect()->route('admin.goToBusinessPage', ['id' => 3]);
        } else if($id == 4) {
            return redirect()->route('admin.goToEducationPage', ['id' => 4]);
        } else {
            return redirect()->route('admin.goToEntertainmentPage', ['id' => 5]);
        }
    }

    public function destroy(Request $request, $id): RedirectResponse
    {
        $category_id = $request->query('category_id');
        $category = Category::find($category_id);
        $category->delete();
        if($id == 1) {
            return redirect()->route('admin.goToWorldPage', ['id' => 1]);
        } else if($id == 2) {
            return redirect()->route('admin.goToSportPage', ['id' => 2]);
        } else if($id == 3) {
            return redirect()->route('admin.goToBusinessPage', ['id' => 3]);
        } else if($id == 4) {
            return redirect()->route('admin.goToEducationPage', ['id' => 4]);
        } else {
            return redirect()->route('admin.goToEntertainmentPage', ['id' => 5]);
        }
    }
}
