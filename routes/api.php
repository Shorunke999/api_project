<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controllername;
use App\Models\User;

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
    Route::get('/datagotten/{id?}' , [controllername::class ,'functionname']);
    Route::post('/add_data' , [controllername::class , 'data_adder']);
    Route::delete('/delete/{name}' , [controllername::class , 'destroy']);
    Route::put('/update' , [controllername::class , 'update']);
});
Route::post('/Register',[controllername::class , 'register']);
Route::post('/tokens/create',[controllername::class , 'login']);