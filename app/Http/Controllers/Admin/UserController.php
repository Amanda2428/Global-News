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
        // Apply the where clause before paginating
        $users = User::where('role', 0)->paginate(5);
        return view('admin.user-list', compact('users'));
    }

    public function goToAdminList(): View
    {
        $admins = User::where('role', 1)->paginate(5); 
        return view('admin.admin-list', compact('admins'));
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




    public function adminStore(Request $request): RedirectResponse
    {

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => 1,
            'category_type' => $request->input('category_type'),
            'remember_token' => Str::random(60),
            'email_verified_at' => Carbon::now(),
        ];
        $admin = User::create($data);

        return redirect()->route('admin.goToAdminList')->with('success', 'Admin created successfully.');
    }




    public function goToDashBoard(): View
    {
        $users = User::paginate(5);
        return view('dashboard', compact('users'));
    }

    public function userPagesearch(Request $request)
    {
        $query = $request->input('query');
        $users = User::where('email', 'LIKE', "%$query%")->paginate(5);
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

    public function adminPageSearch(Request $request): View
    {
        $query = $request->input('query');
        $admins = User::where('role', 1)
            ->where('email', 'LIKE', "%$query%")
            ->paginate(2); // Ensure paginate is used here

        return view('admin.admin-list', compact('query', 'admins'));
    }

    //for chart
    public function getSubscriptionStats()
    {
        $SUBSCRIBED_YES = 1;
        $SUBSCRIBED_NO = 0;
        $yesCount = User::where('subscribed', $SUBSCRIBED_YES)->count();
        $noCount = User::where('subscribed', $SUBSCRIBED_NO)->count();

        return response()->json([
            'yes' => $yesCount,
            'no' => $noCount,
        ]);
    }
    public function getUserIncreaseStats()
    {

        $users = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();


        return response()->json([
            'dates' => $users->pluck('date'),
            'users' => $users->pluck('count'),
        ]);
    }
}
