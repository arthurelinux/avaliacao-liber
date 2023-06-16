<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use L5Swagger\Http\Controllers\SwaggerController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login', [App\Http\Controllers\AuthController::class  ,'login']);
    Route::post('logout', [App\Http\Controllers\AuthController::class  ,'logout']);
    Route::post('refresh', [App\Http\Controllers\AuthController::class  ,'refresh']);
    Route::post('me', [App\Http\Controllers\AuthController::class  ,'me']);

});

Route::post('register', [App\Http\Controllers\UserController::class, 'register']);
Route::post('cadastro', [App\Http\Controllers\EmailsController::class, 'store']);

Route::post('/emails/search',  [App\Http\Controllers\EmailsController::class, 'search'])->middleware('jwt.auth');

Route::get('/emails/index',  [App\Http\Controllers\EmailsController::class, 'index'])->middleware('jwt.auth');



Route::get('/documentation', [SwaggerController::class, 'api'])->name('l5swagger.api');
