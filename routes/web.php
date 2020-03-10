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
    return view('home');
});

Route::get('/home', function () {
  return view('home');
});

Route::get('/panel', 'PanelController@index')->name('panel');

Route::get('/catalogue', 'CatalogueController@index')->name('catalogue');

Route::resource('/clients', 'ClientController');

Route::resource('/works', 'WorkController');

Route::resource('/employees', 'EmployeeController');

Route::resource('/work-orders', 'WorkOrderController');

Route::resource('/banks', 'BankController');

Route::resource('/samples', 'SampleController');

Route::resource('/compactions', 'DynamicCompactionController')
  ->middleware('auth');

Route::get('/statuses/{id}', 'StatusController@index')
  ->middleware('auth');
