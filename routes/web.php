<?php

use Illuminate\Support\Facades\Route;

use App\Subscription;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionMail;
use Carbon\Carbon;


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
//     return Carbon::now()->subHours(12)->toDateTimeString();
// });

Route::get('/unsubscribe/{uuid}', 'SubscriptionController@removeSubscription');
Route::get('/confirmsubscription/{uuid}', 'SubscriptionController@confirmSubscription');


Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '^(?!api).*$');

