<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AuthorController as AuthorController;
use App\Http\Controllers\CategoryController as CategoryController;
use App\Http\Controllers\CategoryTypeController as CategoryTypeController;
use App\Http\Controllers\CommentController as CommentController;
use App\Http\Controllers\ViewController as ViewController;


Route::get('/', function () {
    // return view('admin.user-list');
    return view('landing');
    // return view('auth.register');
    // return view('auth.login');
})->name('user.home');

// Route::get('/dashboard', function () {
//     return view('/dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/user-list', [AdminUserController::class, 'goToUserList'])->name('admin.goToUserList');
    Route::get('/admin/admin-list', [AdminUserController::class, 'goToAdminList'])->name('admin.goToAdminList');

    Route::get('/admin/author-list', [AuthorController::class, 'goToAuthorList'])->name('admin.goToAuthorList');

    // admin world
    Route::get('/admin/world/{id}', [CategoryController::class, 'goToWorldPage'])->name('admin.goToWorldPage');
    // admin world
    Route::get('/admin/sport/{id}', [CategoryController::class, 'goToSportPage'])->name('admin.goToSportPage');
    Route::get('/admin/business/{id}', [CategoryController::class, 'goToBusinessPage'])->name('admin.goToBusinessPage');
    Route::get('/admin/education/{id}', [CategoryController::class, 'goToEducationPage'])->name('admin.goToEducationPage');
    Route::get('/admin/entertainment/{id}', [CategoryController::class, 'goToEntertainmentPage'])->name('admin.goToEntertainmentPage');
    Route::get('/admin/category-types', [CategoryTypeController::class, 'goToCategoryTypes'])->name('admin.goToCategoryTypes');

    Route::get('/admin/comment', [CommentController::class, 'goToComments'])->name('admin.goToComments');
    Route::get('/admin/view', [ViewController::class, 'goToViews'])->name('admin.goToViews');

    Route::get('/dashboard', [AdminUserController::class, 'goToDashBoard'])->name('admin.goToDashBoard');


    // category
    Route::post('/admin/category/{id}', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('admin/category-delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    Route::put('/admin/category-update', [CategoryController::class, 'update'])->name('admin.category.update');    
   
    // user delete
    Route::get('/admin/user-delete/{id}', [AdminUserController::class, 'destroy'])->name('admin.user-list.destroy');


     // world page search
    Route::get('/admin/category-search/{id}', [CategoryController::class, 'WorldPagesearch'])->name('admin.category.WorldPagesearch');

     // sport page search
    Route::get('/admin/category-sport-search/{id}', [CategoryController::class, 'SportPagesearch'])->name('admin.category.SportPagesearch');

    // business page search
    Route::get('/admin/category-business-search/{id}', [CategoryController::class, 'BusinessPagesearch'])->name('admin.category.BusinessPagesearch');

    // education page search
    Route::get('/admin/category-education-search/{id}', [CategoryController::class, 'EducationPagesearch'])->name('admin.category.EducationPagesearch');

    // entertainment page search
    Route::get('/admin/category-entertainment-search/{id}', [CategoryController::class, 'EntertainmentPagesearch'])->name('admin.category.EntertainmentPagesearch');

});



require __DIR__.'/auth.php';
