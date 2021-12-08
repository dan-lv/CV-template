<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserTemplateController;

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
    return redirect()->route('login');
    // return view('welcome');
});
    
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/template/{id}', [UserTemplateController::class, 'generateTemplate'])->middleware(['auth'])->name('template');

Route::post('/create/cv/{id}', [UserTemplateController::class, 'createCv'])->middleware('auth')->name('createCv');

Route::get('/{userId}/cv/{templateId}', [UserTemplateController::class, 'generateCv'])->name('userCv');

require __DIR__.'/auth.php';
