<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Facade;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| ['email']
*/

Route::get('/', function () {
    return view('welcome')->name('one');
});
/*if (App::environment('local')){
    Route::get('/mail' , function(){
       return(new send_email($user))->render();
    });
}*/
Route::get('/message', function () {
    return view('messaging_template');
})->name('message');
Route::post('/message',[Controller::class , 'goo']
)->name('message');
