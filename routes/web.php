<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\PermissionController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\PostController;






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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('back', [AdminController::class, 'index'])->name('back.dashboard');
// Route::resource('back/user', UserController::class);
Route::get('back/users', [UserController::class, 'ins'])->name('user.index');
Route::get('back/users/create', [UserController::class, 'create'])->name('user.create');
Route::post('back/users/store', [UserController::class, 'store'])->name('user.store');
Route::get('back/users/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('back/users/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('back/users/del/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('backpanel/role/assign-permission/{role}', [RoleController::class, 'assignpermission'])->name('role.assign.permission');
Route::post('backpanel/role/assign-permission/{role}', [RoleController::class, 'permissionstore'])->name('role.store.permission');
Route::resource('back/role', RoleController::class);

Route::resource('back/permission', PermissionController::class);

Route::get('back/category/trashed', [CategoryController::class, 'trashedCategory'])->name('category.trash');
Route::post('back/category/restore/{category}', [CategoryController::class, 'restoreCategory'])->name('category.restore');
Route::delete('back/category/delete/{category}', [CategoryController::class, 'forcedeleteCategory'])->name('category.force.delete');
Route::resource('back/category', CategoryController::class);

Route::post('back/post/upload', [PostController::class, 'uploadPhoto'])->name('post.upload');
Route::get('back/post/trashed', [PostController::class, 'trashedPost'])->name('post.trash');
Route::post('back/post/restore/{post}', [PostController::class, 'restorePost'])->name('post.restore');
Route::delete('back/post/delete/{post}', [PostController::class, 'forcedeletePost'])->name('post.force.delete');
Route::resource('back/post', PostController::class);