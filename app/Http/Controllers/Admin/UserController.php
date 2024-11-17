<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

class UserController extends Controller
{
    public function goToUserListPage(): View
    {
        $users = User::get();
        return view('admin.user-list', compact('users'));
    }




    public function goToAdminList(): View
    {
        $admins = User::where('role', '=', 1)->get();
        return view('admin.admin-list', compact( 'admins'));
    }

   

    public function goToDashBoard() : View
    {
        $users = User::get();
        $admins = User::where('role', '=', 1)->get();
        return view('dashboard', compact('users', 'admins'));
    }
}
