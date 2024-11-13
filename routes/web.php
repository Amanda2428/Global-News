<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController as AdminUserController;

Route::get('/', function () {
    // return view('admin.user-list');
    return view('landing');
    // return view('auth.register');
    // return view('auth.login');
})->name('user.home');

Route::get('/dashboard', function () {
    return view('/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/user-list', [AdminUserController::class, 'goToUserListPage'])->name('admin.goToUserList');
    Route::get('/admin/admin-register', [AdminUserController::class, 'goToAdminRegister'])->name('admin.goToAdminRegister');
    Route::get('/admin/category-types', [AdminUserController::class, 'goToCategoryTypes'])->name('admin.goToCategoryTypes');
    Route::get('/admin/admin-list', [AdminUserController::class, 'goToAdminList'])->name('admin.goToAdminList');
    Route::get('/admin/author-list', [AdminUserController::class, 'goToAuthorList'])->name('admin.goToAuthorList');
    Route::get('/admin/world', [AdminUserController::class, 'goToWorldPage'])->name('admin.goToWorldPage');
    Route::get('/admin/sport', [AdminUserController::class, 'goToSportPage'])->name('admin.goToSportPage');
    Route::get('/admin/business', [AdminUserController::class, 'goToBusinessPage'])->name('admin.goToBusinessPage');
    Route::get('/admin/education', [AdminUserController::class, 'goToEducationPage'])->name('admin.goToEducationPage');
    Route::get('/admin/entertainment', [AdminUserController::class, 'goToEntertainmentPage'])->name('admin.goToEntertainmentPage');
});



require __DIR__.'/auth.php';
