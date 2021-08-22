<?php
/**
 * Authenticated routes
 * Middleware 'auth'
 */

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');
Route::resource('complaints', 'ComplaintsController');

Route::post('/complaints/comments/create/{complaintId}', 'ComplaintsController@createComments')->name('complaints.create.comments');
Route::post('/complaints/comments/destroy', 'ComplaintsController@destroyComments')->name('complaints.destroy.comments');
Route::get('/complaints/comments/list/{complaintId}', 'ComplaintsController@listComments')->name('complaints.list.comments');
Route::get('/complaints/set-is-solved/{complaintId}/{isSolved}', 'ComplaintsController@setIsSolved')->name('complaints.setIsSolved');

Route::get('/complaints/get/map', 'ComplaintsController@indexMap')->name('complaints.map');
Route::get('/complaints/get/map-list', 'ComplaintsController@listComplaintsMap')->name('complaints.map.list');

Route::get('/address/states', 'StateCityController@getStatesJson')->name('states.json.all');
Route::get('/address/{abbr}/cities/', 'StateCityController@getCitiesJsonFor')->name('cities.state.json');
