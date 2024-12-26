<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AuthorController as AuthorController;
use App\Http\Controllers\CategoryController as CategoryController;
use App\Http\Controllers\CategoryTypeController as CategoryTypeController;
use App\Http\Controllers\CommentController as CommentController;
use App\Http\Controllers\ViewController as ViewController;
use App\Http\Controllers\LandingController as LandingController;
use App\Models\User;
use App\Models\Author;
use App\Models\Category;
use App\Models\CategoryType;


Route::get('/', [LandingController::class, 'goToLandingPage'])->name('user.home');
Route::get('/user/categories/{id}', [CategoryController::class, 'goToUserCategories'])->name('user.categories');
Route::get('/user/author/{id}', [AuthorController::class, 'goToAuthorPage'])->name('user.author-list');



Route::middleware('auth')->group(function () {

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/destory', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/users', [AdminUserController::class, 'listUsers'])->name('listUsers');

    Route::get('/admin/admin-list', [AdminUserController::class, 'goToAdminList'])->name('admin.goToAdminList');

    Route::get('/admin/author-list', [AuthorController::class, 'goToAuthorList'])->name('admin.goToAuthorList');

    // admin world
    Route::get('/admin/world/{id}', [CategoryController::class, 'goToWorldPage'])->name('admin.goToWorldPage');
    Route::get('/admin/sport/{id}', [CategoryController::class, 'goToSportPage'])->name('admin.goToSportPage');
    Route::get('/admin/business/{id}', [CategoryController::class, 'goToBusinessPage'])->name('admin.goToBusinessPage');
    Route::get('/admin/education/{id}', [CategoryController::class, 'goToEducationPage'])->name('admin.goToEducationPage');
    Route::get('/admin/entertainment/{id}', [CategoryController::class, 'goToEntertainmentPage'])->name('admin.goToEntertainmentPage');
    Route::get('/admin/category-types', [CategoryTypeController::class, 'goToCategoryTypes'])->name('admin.goToCategoryTypes');

    Route::get('/admin/comment', [CommentController::class, 'goToComments'])->name('admin.goToComments');
    Route::get('/admin/view', [ViewController::class, 'goToViews'])->name('admin.goToViews');
    Route::get('/admin/view/search', [ViewController::class, 'viewSearch'])->name('admin.viewSearch');


    Route::get('/dashboard', [AdminUserController::class, 'goToDashBoard'])->name('dashboard');


    // category
    Route::post('/admin/category/{id}', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('admin/category-delete', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    Route::put('/admin/category-update', [CategoryController::class, 'update'])->name('admin.category.update');

    //Categories Searching
    Route::get('/admin/category-search/{id}', [CategoryController::class, 'WorldPagesearch'])->name('admin.category.WorldPagesearch');
    Route::get('/admin/category-sport-search/{id}', [CategoryController::class, 'SportPagesearch'])->name('admin.category.SportPagesearch');
    Route::get('/admin/category-business-search/{id}', [CategoryController::class, 'BusinessPagesearch'])->name('admin.category.BusinessPagesearch');
    Route::get('/admin/category-education-search/{id}', [CategoryController::class, 'EducationPagesearch'])->name('admin.category.EducationPagesearch');
    Route::get('/admin/category-entertainment-search/{id}', [CategoryController::class, 'EntertainmentPagesearch'])->name('admin.category.EntertainmentPagesearch');

    // user
    Route::get('/admin/user-list', [AdminUserController::class, 'listUsers'])->name('admin.goToUserList');
    Route::get('/admin/user-delete/{id}', [AdminUserController::class, 'destroy'])->name('admin.user-list.destroy');
    Route::get('/admin/user-search', [AdminUserController::class, 'UserPagesearch'])->name('admin.user.UserPagesearch');



    //author
    Route::post('/author/store', [AuthorController::class, 'store'])->name('author.store');
    Route::get('/author/delete/{id}', [AuthorController::class, 'destroy'])->name('author.destroy');
    Route::put('/author/update', [AuthorController::class, 'update'])->name('author.update');
    Route::get('/admin/author-search', [AuthorController::class, 'AuthorPagesearch'])->name('admin.author.AuthorPagesearch');


    //category_type
    Route::post('/admin/category-types/store', [CategoryTypeController::class, 'store'])->name('category-types.store');
    Route::put('/admin/category-types/update', [CategoryTypeController::class, 'update'])->name('category-types.update');
    Route::get('/admin/category-types-delete/{id}', [CategoryTypeController::class, 'destroy'])->name('category-types.destroy');
    Route::get('/admin/category-types-search', [CategoryTypeController::class, 'CategoryTypePagesearch'])->name('admin.CategoryTypePagesearch');

    //admin-list
    Route::post('admin/admin-list/store', [AdminUserController::class, 'adminStore'])->name('admin.store');
    Route::put('admin/admin-list/update', [AdminUserController::class, 'adminUpdate'])->name('admin.update');
    Route::get('/admin/admin-list-delete/{id}', [AdminUserController::class, 'adminDestroy'])->name('admin.destroy');
    Route::get('/admin/admin-search', [AdminUserController::class, 'adminPageSearch'])->name('admin.adminPageSearch');


    //Comment
    Route::get('/admin/comment-delete/{id}', [CommentController::class, 'destroy'])->name('admin.commentDelete');
    Route::get('/admin/comment-search', [CommentController::class, 'CommentsPagesearch'])->name('admin.CommentsPagesearch');
    Route::post('user/submit-comment', [CommentController::class, 'userComment'])->name('user.comment');
    Route::delete('/user/comment/{id}', [CommentController::class, 'destroyCommentUser'])->name('user.comment.destroy');
    Route::patch('/user/comment/{id}', [CommentController::class, 'updateCommentUser'])->name('user.comment.update');
    


    // user site


    Route::get('/user/detail/{id}', [CategoryController::class, 'goToDetailPage'])->name('user.detail');
    Route::get('/search', [CategoryController::class, 'search'])->name('category.search');

    Route::get('/category-analytics', [LandingController::class, 'categoryAnalytics']);

    Route::get('/api/subscription-stats', [AdminUserController::class, 'getSubscriptionStats']);
    Route::get('/admin/analysis', [LandingController::class, 'goToAnalysisPage'])->name('admin.goToAnalysis');
    Route::get('/api/user-increase', [AdminUserController::class, 'getUserIncreaseStats']);
    Route::get('/api/authors-category-type', [AuthorController::class, 'getAuthorsCategoryStats']);
});



require __DIR__ . '/auth.php';
