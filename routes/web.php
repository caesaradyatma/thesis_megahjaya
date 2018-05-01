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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',function(){
        return view('Pages.index');
});

Route::resource('incomes','IncomesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('outcomes','OutcomesController');

Route::resource('utangs','UtangsController');

Route::resource('piutangs','PiutangsController');

// Route::resource('invoices','InvoicesController');

Route::get('inStatement','IncomeStatementController@index');

Route::get('inStatement/report','IncomeStatementController@show');

Route::get('cashFlow','CashFlowStatementController@index');

Route::get('cashFlow/report','CashFlowStatementController@show');

Route::resource('employees','EmployeeController');

Route::get('attendance','AttendanceController@index');

Route::post('attendance/submit','AttendanceController@create');

Route::get('invoices/','InvoicesController@index');

Route::get('invoices/create','InvoicesController@create');

Route::get('invoices/{invoice}/getAddToCart','InvoicesController@getAddToCart');

Route::get('invoices/getCart','InvoicesController@getCart');

Route::post('invoices/','InvoicesController@store');
