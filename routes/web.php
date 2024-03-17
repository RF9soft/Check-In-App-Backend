<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\TipController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\DataController;
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


Route::get('/checkin-lists', [DataController::class, 'checkinLists']);

//installation

Route::get('/install', [InstallController::class, 'install']);
Route::post('store-info', [InstallController::class, 'storeInfo']);

Route::get('/admin-register', [InstallController::class, 'adminRegister']);

Route::post('register-admin', [InstallController::class, 'registerAdmin']);

Route::get('/', [IndexController::class, 'indexPage'])->middleware('is.config');

Route::post('admin-login', [AccessController::class, 'adminLogin']);



Route::get('/logout', [AccessController::class, 'Logout']);


Route::group(['middleware' => 'prevent-back-history'],function(){

	//admin dashboard

    Route::get('/dashboard', [DashboardController::class, 'Dashboard']);

     Route::get('/user-lists', [DashboardController::class, 'userLists']);

     Route::get('/delete-user/{id}', [DashboardController::class, 'deleteUser']);

	//settings
	Route::get('/account-settings', [SettingController::class, 'accountSettings']);
	Route::post('settings-account', [SettingController::class, 'settingsAccount']);
	Route::get('/app-settings', [SettingController::class, 'appSettings']);
	Route::post('settings-app', [SettingController::class, 'settingsApp']);
	Route::get('/ads-settings', [SettingController::class, 'adsSetting']);
	Route::post('settings-add', [SettingController::class, 'settingsAdd']);

	Route::get('/change-password', [SettingController::class, 'changePassword']);

	Route::post('password-change', [SettingController::class, 'passwordChange']);

});

