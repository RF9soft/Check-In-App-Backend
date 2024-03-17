<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
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

Route::post('signup', [ApiController::class, 'signup']);
Route::post('signin', [ApiController::class, 'signin']);
Route::middleware('auth:sanctum')->group( function () { 
    Route::post('logout', [ApiController::class, 'logout']);

    Route::post('store-checkin', [ApiController::class, 'storeCheckin']);

    Route::get('/all-checkins', [ApiController::class, 'allCheckins']);
    
    Route::post('checkin-by-date', [ApiController::class, 'checkinDate']);

    Route::get('/today-checkin', [ApiController::class, 'todayCheckin']);

});

Route::get('/user-supervisors', [ApiController::class, 'userSupervisor']);

Route::get('/user-social-workers', [ApiController::class, 'userSocialWorkers']);


