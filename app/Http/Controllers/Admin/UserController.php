<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function goToUserList(): View
    {
        $users = User::get();
        return view('admin.user-list', compact('users'));
    }   


    public function destroy(Request $request, $id): RedirectResponse
    {
        $user_id = $request->query('user_id');
        
        // Validate and find the user
        $user = User::where('role', 0)->findOrFail($user_id);
        
        // Delete the user
        $user->delete();
        
        return redirect()->route('admin.goToUserList')->with('success', 'User deleted successfully.');
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

    public function userPagesearch(Request $request)
{
    $query = $request->input('query'); 
    $users= User::where('email', 'LIKE', "%$query%")->get();
    return view('admin.user-list', compact( 'query','users'));
}
}
