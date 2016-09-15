<?php

use App\Http\Controllers\AuctionsController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', "AuctionsController@welcome");

Route::auth();

Route::resource('auctions', 'AuctionsController');

Route::resource('news', 'BlogsController');

Route::get('departments/{departments}', 'DepartmentsController@show');