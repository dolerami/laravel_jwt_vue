<?php

use App\Http\Controllers\Fruit\IndexController;
use App\Http\Controllers\User\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;

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

Route::group(['middleware'=>'api', 'prefix'=>'auth'], function () {
    Route::post('login', [AuthController::class,'login']);
    Route::post('register', [AuthController::class,'register']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);

    Route::group(['middleware'=>'auth:api'], function(){
        Route::group(['namespace' => 'Fruit', 'prefix' => 'fruits'], function() {
            Route::get('/', [IndexController::class, 'index']);
        });
    });
});

//Route::controller(TodoController::class)->group(function () {
//    Route::get('todos', 'index');
//    Route::post('todo', 'store');
//    Route::get('todo/{id}', 'show');
//    Route::put('todo/{id}', 'update');
//    Route::delete('todo/{id}', 'destroy');
//
//
//});


Route::group(['namespace' => 'User', 'prefix' => 'users'], function() {
    Route::post('/', [StoreController::class, 'index']);
});
