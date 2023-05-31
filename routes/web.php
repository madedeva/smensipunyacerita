<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCurhatController;
use App\Http\Controllers\CurhatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    // admin
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/about', [AdminController::class, 'about'])->name('admin.about');

    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');

    // curhat
    Route::get('/curhat', [App\Http\Controllers\AdminCurhatController::class, 'index'])->name('admin.curhat.index');
    Route::get('/balas/{curhat:id}', [App\Http\Controllers\AdminCurhatController::class, 'edit'])->name('admin.curhat.edit');
    Route::put('/balas/{curhat:id}', [App\Http\Controllers\AdminCurhatController::class, 'update'])->name('admin.curhat.update');
    Route::delete('/delete/{curhat:id}', [App\Http\Controllers\AdminCurhatController::class, 'destroy'])->name('admin.curhat.destroy');

    // user siswa
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('admin.users.index');
    Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('admin.users.create');
    Route::post('/user', [App\Http\Controllers\UserController::class, 'store'])->name('admin.users.store');
    Route::get('/user/{user:id}', [App\Http\Controllers\UserController::class, 'show'])->name('admin.users.show');
    Route::get('/user/{user:id}', [App\Http\Controllers\UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/user/{user:id}', [App\Http\Controllers\UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/user/{user:id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/guru', [App\Http\Controllers\UserController::class, 'guru'])->name('admin.users.guru');
    Route::get('/admin', [App\Http\Controllers\UserController::class, 'admin'])->name('admin.users.admin');

    // import excel
    Route::post('/import_excel', [UserController::class, 'import_excel'])->name('admin.users.import_excel');

    // category
    Route::get('/blog/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/blog/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/blog/category', [App\Http\Controllers\CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/blog/category/{category:id}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/category/{category:id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/category/{category:id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('admin.category.destroy');

    // blog
    Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('admin.blog.index');
    Route::get('/blog/create', [App\Http\Controllers\BlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/blog', [App\Http\Controllers\BlogController::class, 'store'])->name('admin.blog.store');
    Route::get('/blog/{blog:id}/edit', [App\Http\Controllers\BlogController::class, 'edit'])->name('admin.blog.edit');
    Route::put('/blog/{blog:id}', [App\Http\Controllers\BlogController::class, 'update'])->name('admin.blog.update');
    Route::delete('/blog/{blog:id}', [App\Http\Controllers\BlogController::class, 'destroy'])->name('admin.blog.destroy');
    Route::get('/blog/{blog:slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('admin.blog.show');
    
});

// curhat
Route::get('/curhat', [App\Http\Controllers\CurhatController::class, 'index'])->name('curhat.index');
Route::get('/curhat/bagikan_cerita', [App\Http\Controllers\CurhatController::class, 'create'])->name('curhat.create');
Route::post('/curhat', [App\Http\Controllers\CurhatController::class, 'store'])->name('curhat.store');
Route::get('/cerita_saya/{curhat:id}', [App\Http\Controllers\HomeController::class, 'show'])->name('curhat.show');
Route::get('/cerita_saya', [App\Http\Controllers\HomeController::class, 'mycurhat'])->name('curhat.mycurhat');
Route::delete('/curhat/{curhat:id}', [App\Http\Controllers\CurhatController::class, 'destroy'])->name('curhat.destroy');
Route::get('/curhat/{curhat:id}', [App\Http\Controllers\CurhatController::class, 'showDetail'])->name('curhat.showDetail');

// blog
Route::get('/blog', [App\Http\Controllers\HomeController::class, 'blog'])->name('blog.index');
Route::get('/blog/{blog:slug}', [App\Http\Controllers\HomeController::class, 'blogshow'])->name('blog.show');