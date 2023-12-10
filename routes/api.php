<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\Frontend\userController;
use App\Http\Controllers\Frontend\workController;
use App\Http\Controllers\birthController;

use App\Models\User;
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


Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {
    Route::get('/bc', [AuthController::class, 'upload']);

    Route::post('login', [AuthController::class,'login'])->name('login');
    Route::get('birth', [birthController::class,'birth'])->name('birth');
    Route::get('pdf', [AuthController::class,'pdf'])->name('pdf');
    Route::post('forgetcode', [AuthController::class,'sendForgetEmail'])->name('sendForgetEmail');
    Route::post('register', [AuthController::class,'register'])->name('register');
    Route::post('logout', [AuthController::class,'logout'])->name('logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', [AuthController::class,'me']);
    Route::post('forget', [AuthController::class,'forget']);

});

Route::group([

    'middleware' => ['api'],
    'namespace' => 'App\Http\Controllers',
   

], function ($router) {


});
