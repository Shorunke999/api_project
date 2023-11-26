<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controllername;
use App\Models\User;
use App\Http\Controllers\fileuploadcontroller;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware'=>'auth:sanctum'], function (){
    //authenticated route with sanctum
    Route::get('/sho_api/{id?}' , [controllername::class ,'index']);
    Route::post('/sho_api' , [controllername::class , 'store']);
    Route::delete('/sho_api/{id}' , [controllername::class , 'destroy']);
    Route::put('/sho_api' , [controllername::class , 'update']);
});
Route::post('/sho_api/Register',[fileuploadcontroller::class , 'register']);
Route::post('/sho_api/login_token',[fileuploadcontroller::class , 'login']);