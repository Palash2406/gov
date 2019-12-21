<?php

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

Route::get('/','MenuController@index')->name('public');


Route::resources([
    'menus' => 'MenuController',
    'attachment' => 'AttachmentController',
    'file'=>'FileController',
    'link'=>'LinkController',
    'page'=>'PageController',
    'slider'=>'SliderController'
]);


Route::get('attachment_form/{menu}/{form_type}','AttachmentController@create')->name('attachment_form');
Route::get('attachment_edit_form/{id}/{form_type}','AttachmentController@edit')->name('attachment_edit');

Route::get('attachments/{menu}','AttachmentController@index')->name('attachment.index');
Route::get('page/{page}','PageController@show')->name('page');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin', function(){

    return view('welcome');
})->name('admin');



