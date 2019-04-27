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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Auth::routes(['verify' => true]);


Route::get('/newgroup', 'GroupsController@newgroup');
Route::get('gs/{id}', 'GroupsController@groupselect');

// Route::get('create', 'GroupsController@create');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile');

Route::post('nwgroup', 'GroupsController@store');
// Route::resource('nwgroup','GroupsController');
Route::post('mnet/sms/gateway','GatewayAPI@store');



Route::get('/allgroups', 'HomeController@allgroups');

//invitations////////////////////////////////////////////////////////////////////
Route::get('gs/invite', 'InvitesController@invite')->name('invite');
// Route::post('gs/process', 'InvitesController@invite')->name('invite');
Route::post('gs/invite', 'InvitesController@process')->name('process');
// {token} is a required parameter that will be exposed to us in the controller method
Route::get('gs/accept/{token}', 'InvitesController@accept')->name('accept');
Route::post('joingroup', 'InvitesController@linkjoin');
Route::post('gs/confirmmember', 'InvitesController@confirm')->name('confirm');



Route::get('gs/members/{id}', 'GroupsController@members');
Route::get('gs/invites/{id}', 'GroupsController@invites');
Route::get('gs/deposits/{id}', 'GroupsController@deposits');
Route::get('gs/withdraws/{id}', 'GroupsController@withdraws');
Route::post('gs/withdraw','GroupsController@withdraw');
