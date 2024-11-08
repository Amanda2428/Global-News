<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function goToUserListPage () : View
    {
        return view('admin.user-list');
    }
    public function goToAdminRegister () : View
    {
        return view('admin.admin-register');
    }
}
