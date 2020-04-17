<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


use App\Mail\SubscriptionMail;


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
// Route::get('/email', function() {
//     return Mail::to('kelechiokwuriki@gmail.com')->send(new SubscriptionMail());
//     // return new SubscriptionMail();
// });

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '^(?!api).*$');

