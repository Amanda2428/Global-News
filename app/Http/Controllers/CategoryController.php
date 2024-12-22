<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryType;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\View as ViewModel;
use App\Models\Author;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function goToWorldPage($id): View
    {
        $categories = Category::where('category_type_id', '=', $id)->with('author')->paginate(5);
        $authors = Author::get();
        return view('admin.world', compact('categories', 'authors'));
    }

    public function goToSportPage($id): View
    {
        $categories = Category::where('category_type_id', '=', $id)->with('author')->paginate(5);
        $authors = Author::get();
        return view('admin.sport', compact('categories', 'authors'));
    }

    public function goToBusinessPage($id): View
    {
        $categories = Category::where('category_type_id', '=', $id)->with('author')->paginate(5);
        $authors = Author::get();
        return view('admin.business', compact('categories', 'authors'));
    }

    public function goToEducationPage($id): View
    {
        $categories = Category::where('category_type_id', '=', $id)->with('author')->paginate(5);
        $authors = Author::get();
        return view('admin.education', compact('categories', 'authors'));
    }

    public function goToEntertainmentPage($id): View
    {
        $categories = Category::where('category_type_id', '=', $id)->with('author')->paginate(5);
        $authors = Author::get();
        return view('admin.entertainment', compact('categories', 'authors'));
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

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['image'] = $filename;
        }
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('videos'), $filename);
            $data['video'] = $filename;
        }

        Category::create($data);

        session()->flash('success', 'Category has been successfully created.');

        if ($id == 1) {
            return redirect()->route('admin.goToWorldPage', ['id' => 1]);
        } elseif ($id == 2) {
            return redirect()->route('admin.goToSportPage', ['id' => 2]);
        } elseif ($id == 3) {
            return redirect()->route('admin.goToBusinessPage', ['id' => 3]);
        } elseif ($id == 4) {
            return redirect()->route('admin.goToEducationPage', ['id' => 4]);
        } else {
            return redirect()->route('admin.goToEntertainmentPage', ['id' => 5]);
        }
    }

    public function destroy(Request $request, $id): RedirectResponse
    {
        $category_id = $request->query('category_id');
        $category = Category::find($category_id);

        if ($category) {
            $category->delete();
            session()->flash('success', 'Category has been successfully deleted.');
        } else {
            session()->flash('error', 'Category not found.');
        }

        if ($id == 1) {
            return redirect()->route('admin.goToWorldPage', ['id' => 1]);
        } elseif ($id == 2) {
            return redirect()->route('admin.goToSportPage', ['id' => 2]);
        } elseif ($id == 3) {
            return redirect()->route('admin.goToBusinessPage', ['id' => 3]);
        } elseif ($id == 4) {
            return redirect()->route('admin.goToEducationPage', ['id' => 4]);
        } else {
            return redirect()->route('admin.goToEntertainmentPage', ['id' => 5]);
        }
    }


    public function update(Request $request): RedirectResponse
    {
        $id = $request->input('id');
        $category = Category::find($id);

        if (!$category) {
            session()->flash('error', 'Category not found.');
            return redirect()->back();
        }

        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $category->social_media_link = $request->input('social_media_link');
        $category->author_id = $request->input('author_id');

        if ($request->hasFile('image')) {
            if ($category->image && file_exists(public_path('images/' . $category->image))) {
                unlink(public_path('images/' . $category->image));
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $category->image = $filename;
        }

        if ($request->hasFile('video')) {
            if ($category->video && file_exists(public_path('videos/' . $category->video))) {
                unlink(public_path('videos/' . $category->video));
            }
            $file = $request->file('video');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('videos'), $filename);
            $category->video = $filename;
        }

        $category->save();

        session()->flash('success', 'Category has been successfully updated.');
        return redirect()->back();
    }


    public function WorldPagesearch(Request $request, $id)
    {
        $query = $request->input('query');
        $categories = Category::where('title', 'LIKE', "%$query%")->paginate(5);
        $authors = Author::get();

        return view('admin.world', compact('categories', 'query', 'authors'));
    }

    public function SportPagesearch(Request $request, $id)
    {
        $query = $request->input('query');
        $categories = Category::where('title', 'LIKE', "%$query%")->paginate(5);
        $authors = Author::get();
        return view('admin.sport', compact('categories', 'query', 'authors'));
    }

    public function BusinessPagesearch(Request $request, $id)
    {
        $query = $request->input('query');
        $categories = Category::where('title', 'LIKE', "%$query%")->paginate(5);
        $authors = Author::get();
        return view('admin.business', compact('categories', 'query', 'authors'));
    }

    public function EntertainmentPagesearch(Request $request, $id)
    {
        $query = $request->input('query');
        $categories = Category::where('title', 'LIKE', "%$query%")->paginate(5);
        $authors = Author::get();
        return view('admin.entertainment', compact('categories', 'query', 'authors'));
    }

    public function EducationPagesearch(Request $request, $id)
    {
        $query = $request->input('query');
        $categories = Category::where('title', 'LIKE', "%$query%")->paginate(5);
        $authors = Author::get();
        return view('admin.education', compact('categories', 'query', 'authors'));
    }

    public function goToUserCategories($id): View
    {
        $categories = Category::where('category_type_id', '=', $id)->with('author')->get();
        $category_types = CategoryType::get();
        $authors = Author::get();
        return view(('user.categories'), compact('categories', 'authors', 'category_types'));
    }

    public function goToDetailPage($id): \Illuminate\Contracts\View\View
    {
        $item = Category::findOrFail($id);
        $latestCategories = Category::latest()->take(5)->get();
        $comments = Comment::where('category_id', $id)->with('user')->latest()->get();

        ViewModel::create([
            'category_id' => $id,
            'user_id' => Auth::id(),
        ]);

        $totalViews = ViewModel::where('category_id', $id)->count();

        return view('user.detail', compact('item', 'latestCategories', 'comments', 'totalViews'));
    }
    public function search(Request $request)
    {
        $searchTerm = $request->get('query');
        $referrer = $request->header('referer');

        $categories = Category::where('title', 'like', '%' . $searchTerm . '%')->get();


        if ($request->ajax()) {
            return response()->json($categories);
        }


        if ($categories->isNotEmpty()) {
            return redirect()->route('user.detail', ['id' => $categories->first()->id]);
        }

        return redirect($referrer)->with('error', 'No categories found.');
    }
}
