<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\member\BlogMemberController;
use App\Http\Controllers\Member\HomeController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [MemberController::class, 'viewLogin']);
Route::get('/register', [MemberController::class, 'viewRegister']);
Route::post('/login', [MemberController::class, 'postLogin']);
Route::post('/register', [MemberController::class, 'postRegister']);
Route::post('/logout', [MemberController::class, 'logout']);
Route::get('/blog', [BlogMemberController::class, 'index']);
Route::get('/blog/{id}', [BlogMemberController::class, 'show']);


Route::get('/login/admin', [UserController::class, 'getLoginAdmin']);
Route::post('/login/admin', [UserController::class, 'postLoginAdmin']);
Route::prefix('/admin')->middleware('check_admin')->group(function () {
    //Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::resource('/category', CategoryController::class);
    Route::resource('/profile', ProfileController::class);
    Route::resource('/blog', BlogController::class);
    // Route::get('/category/add', [CategoryController::class, 'create']);
    // Route::post('/category/add', [CategoryController::class, 'store']);
});
