<?php
/**
 * Unauthenticated routes
 */

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/complaints', 'ComplaintsController@index');
