<?php
/**
 * Authenticated routes
 * Middleware 'auth', 'web'
 * Prefix pagination
 */

Route::get('users', 'UserController@pagination')->name('pagination.users');
Route::get('complaints', 'ComplaintsController@pagination')->name('pagination.complaints');
