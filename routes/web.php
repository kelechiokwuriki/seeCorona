<?php

use Illuminate\Support\Facades\Route;

use App\Subscription;
use Illuminate\Support\Facades\Mail;
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
Route::get('/email', function() {
    $subscriptions = Subscription::all();

    foreach($subscriptions as $sub) {
        Mail::to($sub->email)->send(new SubscriptionMail($sub->country, $sub->unique_identifier));
    }
});

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '^(?!api).*$');

