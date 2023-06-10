<?php

use App\Http\Controllers\Api\CategoryControlleApi;
use App\Http\Controllers\Api\PartnerControllerApi;
use App\Http\Controllers\Api\PaymentControllerApi;
use App\Http\Controllers\Api\UserControllerApi;
use App\Http\Controllers\Member\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/partner', [PartnerControllerApi::class, 'view']);
Route::get('/category', [CategoryControlleApi::class, 'view']);
Route::post('/login', [UserControllerApi::class, 'login']);
Route::get('/partner/{id}', [PartnerControllerApi::class, 'detail']);
Route::post('/payment', [PaymentControllerApi::class, 'payment']);
Route::get('/payment/detail/{id}/{status}', [PaymentControllerApi::class, 'detail']);
Route::get('/payment/total/{id}', [PaymentControllerApi::class, 'totalUser']);
Route::get('/category/{id}', [CategoryControlleApi::class, 'show']);
// Route::get('/partner/room/{id}', [PartnerControllerApi::class, 'imagePartner']);
