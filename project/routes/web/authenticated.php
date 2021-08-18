<?php
/**
 * Authenticated routes
 * Middleware 'auth'
 */

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');
Route::resource('complaints', 'ComplaintsController');

Route::get('/address/states', 'StateCityController@getStatesJson')->name('states.json.all');
Route::get('/address/{abbr}/cities/', 'StateCityController@getCitiesJsonFor')->name('cities.state.json');
