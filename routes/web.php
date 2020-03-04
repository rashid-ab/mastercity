<?php

Route::group(['middleware'=>'web'],function(){
// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('cd','CDController@index');
Route::post('add_client','CDController@add_client');
Route::get('delete_client/{id}','CDController@delete_client');
Route::post('client_update','CDController@client_update');
Route::post('add_cd','CDController@add_cd');
Route::get('get_clients','CDController@get_clients');
Route::get('delete_cd/{id}','CDController@delete_cd');
Route::post('cd_update','CDController@cd_update');
Route::post('client_search','CDController@client_search');
Route::post('cd_search','CDController@cd_search');


Route::post('home','HomeController@store');
Route::post('home1','HomeController@party');
Route::post('search','HomeController@search');
Route::post('searchs','HomeController@searchs');
Route::post('searches','HomeController@searches');
Route::post('searchees','HomeController@storees');
Route::get('/','HomeController@index');

Route::get('/items','ItemController@index');
Route::post('/items', 'ItemController@store');

Route::get('/items/itemupdate/{id}','ItemController@edit');
Route::post('/items/itemupdate/{id}','ItemController@update');

Route::get('/items/delete/{id}','ItemController@destroy');
Route::get('/items/deletes/{id}','ItemController@destroys');

Route::get('/items/plot','ItemController@show');
Route::post('/items/plotupdate/{id}','ItemController@updates');

Route::get('/items/plotupdate/{id}','ItemController@edits');
Route::get('/home/show/{id}','ShowController@show');
Route::get('/home/showss/{id}','ShowController@showss');
Route::get('/home/shows/{id}','HomeController@shows');

Route::get('/home/update/{id}','ShowController@edit');
Route::post('/home/update/{id}','ShowController@update');
Route::get('/home/updates/{id}','ShowController@edits');
Route::post('/home/updates/{id}','ShowController@updates');
Route::get('/home/updatess/{id}','ShowController@editss');
Route::post('/home/updatess/{id}','ShowController@updatess');

Route::get('/home/delete/{id}','ShowController@destroy');
Route::get('/home/deletes/{id}','ShowController@destroys');
Route::get('/home/deletess/{id}','ShowController@destroyss');

Route::get('/master','HomeController@dis');


Route::post('add_office_expense','HomeController@add_office');
Route::post('office_search','HomeController@office_search');
Route::post('perday_update','HomeController@perday_update');
Route::post('party_update','HomeController@party_update');
Route::post('thekedar_update','HomeController@thekedar_update');
Route::post('office_update','HomeController@office_update');

Route::get('get_item','HomeController@item_index');
Route::post('get_item','HomeController@add_item');
Route::get('edit_item/{id}','HomeController@edit_item');
Route::post('edit_item/{id}','HomeController@update_item');
Route::post('get_itemss','HomeController@get_items');




});
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
