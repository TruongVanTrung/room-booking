<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\member\BlogMemberController;
use App\Http\Controllers\Member\HomeController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Member\PartnerMemberController;
use App\Http\Controllers\Member\PaymentController;
use App\Http\Controllers\Member\SearchController;
use App\Http\Controllers\OrderPartnerController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
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
Route::get('/register/partner', [PartnerController::class, 'index']);
Route::post('/register/partner', [PartnerController::class, 'create']);

Route::get('/login/admin', [UserController::class, 'getLoginAdmin']);
Route::post('/login/admin', [UserController::class, 'postLoginAdmin']);
Route::resource('/profile', ProfileController::class);

Route::get('/detail/{id}', [PartnerMemberController::class, 'view']);
Route::post('/check_date', [PartnerMemberController::class, 'checkDate']);
Route::get('/payment/{id}/{count}', [PaymentController::class, 'index']);
Route::post('/payment', [PaymentController::class, 'payment']);
Route::get('/order/history', [MemberController::class, 'historyOrder']);

Route::get('/search', [SearchController::class, 'index']);
Route::post('/search', [SearchController::class, 'search']);
Route::get('/category/{id}', [HomeController::class, 'category']);

Route::prefix('/partner')->middleware('check_partner')->group(function () {
    Route::resource('/room', RoomController::class);
    Route::get('/profile', [PartnerController::class, 'view']);
    Route::get('/profile/{id}/edit', [PartnerController::class, 'edit']);
    Route::put('/profile/{id}', [PartnerController::class, 'update']);
    Route::get('/order', [OrderPartnerController::class, 'view']);
    Route::put('/order/{id}', [OrderPartnerController::class, 'updateStatus']);
});



Route::prefix('/admin')->middleware('check_admin')->group(function () {
    //Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::resource('/category', CategoryController::class);
    Route::resource('/profile', ProfileController::class);
    Route::resource('/blog', BlogController::class);
});
