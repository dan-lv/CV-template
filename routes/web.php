<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserTemplateController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\Admin\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return redirect()->route('login');
    return view('welcome');
});
    
Route::get('/dashboard', function () {
    return redirect()->route('template', 1);
})->middleware(['auth'])->name('dashboard');

Route::get('/template/{id}', [UserTemplateController::class, 'generateTemplate'])->middleware(['auth'])->name('template');

Route::post('/create/cv/{id}', [UserTemplateController::class, 'createCv'])->middleware('auth')->name('createCv');

Route::post('admin/create/cv/{userId}/{id}', [UserTemplateController::class, 'createCvFromAdmin'])->name('createCvFromAdmin');

Route::post('delete/user/{userId}', [AdminController::class, 'delete'])->name('deleteUser');

Route::get('/{userName}/cv/{templateId}', [UserTemplateController::class, 'generateCv'])->name('userCv');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware('auth:admin')->name('admin.dashboard');

Route::post('search/cv', [UserTemplateController::class, 'searchCv'])->name('searchCv');

Route::get('/{userName}/post/{postId}', [PostController::class, 'generatePost'])->name('userPost');

Route::get('/create/post', [PostController::class, 'index'])->middleware('auth')->name('createPost');
Route::post('/create/post', [PostController::class, 'savePost'])->middleware('auth')->name('savePost');

Route::get('/category', [CategoryController::class, 'manageCategory'])->middleware('auth')->name('manageCategory');
Route::get('/create/category', [CategoryController::class, 'index'])->middleware('auth')->name('createCategory');
Route::post('/create/category', [CategoryController::class, 'saveCategory'])->middleware('auth')->name('saveCategory');
Route::get('/edit/category/{categoryId}', [CategoryController::class, 'editCategory'])->middleware('auth')->name('editCategory');
Route::post('/delete/category/{categoryId}', [CategoryController::class, 'deleteCategory'])->middleware('auth')->name('deleteCategory');
Route::post('/update/category/{categoryId}', [CategoryController::class, 'updateCategory'])->middleware('auth')->name('updateCategory');

require __DIR__.'/auth.php';
