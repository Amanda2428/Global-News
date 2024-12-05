<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Carbon\Carbon;


class UserController extends Controller
{
    public function listUsers(): View
    {
        $users = User::where('role', 0)->paginate(10);
        return view('admin.user-list', compact('users'));
    }
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

        return view('admin.admin-list', compact('admins'));
    }

    public function adminStore(Request $request): RedirectResponse
    {

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => 1,
            'category_type' => $request->input('category_type'),
            'remember_token' => Str::random(60),
            'email_verified_at' => Carbon::now() ,
        ];
        $admin = User::create($data);

        return redirect()->route('admin.goToAdminList')->with('success', 'Admin created successfully.');
    }




    public function goToDashBoard(): View
    {
        $users = User::get();
        $admins = User::where('role', '=', 1)->get();
        return view('dashboard', compact('users', 'admins'));
    }

    public function userPagesearch(Request $request)
    {
        $query = $request->input('query');
        $users = User::where('email', 'LIKE', "%$query%")->get();
        return view('admin.user-list', compact('query', 'users'));
    }

    public function adminUpdate(Request $request): RedirectResponse
    {

        $admin = User::where('role', '=', 1)->findOrFail($request->id);


        // Update other fields
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->category_type = $request->input('category_type');
        

        $admin->save();

        return redirect()->route('admin.goToAdminList')->with('success', 'Admin data updated successfully!');
    }
    public function adminDestroy($id)
    {
        $admin = User::where('role', 1)->findOrFail($id);

        $admin->delete();

        return redirect()->route('admin.goToAdminList')->with('success', 'Admin deleted successfully.');
    }

    public function adminPageSearch(Request $request)
    {
        $query = $request->input('query');
        $admins = User::where('role', 1)
            ->where('email', 'LIKE', "%$query%")
            ->get();

        return view('admin.admin-list', compact('query', 'admins'));
    }

}
