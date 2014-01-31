<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::bind('girl', function($value, $route)
{
    return Girl::where('name', $value)->first();
});

Route::get('/girl/{girl}', 'GirlController@show');
Route::get('/', 'BirthdayController@today');
