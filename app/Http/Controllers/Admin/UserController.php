<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

class UserController extends Controller
{
    public function index()
{
    $users = User::paginate(20); // Adjust number to control items per page
    return view('admin.users.index', compact('users'));
}
    public function goToUserListPage(): View
    {
        return view('admin.user-list');
    }

    public function goToAdminRegister(): View
    {
        return view('admin.admin-register');
    }

    public function goToCategoryTypes(): View
    {
        return view('admin.category-types');
    }

    public function goToAdminList(): View
    {
        return view('admin.admin-list');
    }

    public function goToAuthorList(): View
    {
        return view('admin.author-list');
    }

    public function goToWorldPage(): View
    {
        return view('admin.world');
    }

    public function goToSportPage(): View
    {
        return view('admin.sport');
    }

    public function goToBusinessPage(): View
    {
        return view('admin.business');
    }

    public function goToEducationPage(): View
    {
        return view('admin.education');
    }

    public function goToEntertainmentPage(): View
    {
        return view('admin.entertainment');
    }
}
