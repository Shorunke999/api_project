<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\send_email;
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
if (App::environment('local')){
    Route::get('/mail' , function(){
        $user = ['name'=> 'olamilekan',
            'email'=> 'shorunke99@gmail.com'];
        Mail::to($user)->send(new send_email($user));
    });
}
