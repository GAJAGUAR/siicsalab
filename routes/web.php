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

use Illuminate\Support\Facades\{Auth, Route};

Auth::routes();
// Auth::routes(['register' => false]);

Route::get('/', function () {
  return view('welcome');
});

Route::get('/panel', 'PanelController@index')->name('panel');

Route::resource('/clients', 'ClientController');

Route::resource('/works', 'WorkController');

Route::resource('/employees', 'EmployeeController');

Route::resource('/work_orders', 'WorkOrderController');

Route::resource('/samples', 'SampleController');

Route::get('/pendings', 'PendingController@index')->name('pendings');
