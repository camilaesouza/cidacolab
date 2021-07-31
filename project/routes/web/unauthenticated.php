<?php
/**
 * Unauthenticated routes
 */

Auth::routes();

Route::get('/', 'WelcomeController');

Route::get('/complaints', 'ComplaintsController@index');
