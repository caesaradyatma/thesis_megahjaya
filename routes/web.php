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

Route::get('/finance','HomeController@finance');

Route::get('/hr','HomeController@hr');

Route::resource('outcomes','OutcomesController');

Route::resource('utangs','UtangsController');

Route::resource('piutangs','PiutangsController');

// Route::resource('invoices','InvoicesController');

Route::get('inStatement','IncomeStatementController@index');

Route::get('inStatement/report','IncomeStatementController@create');

Route::get('cashFlow','CashFlowStatementController@index');

Route::get('cashFlow/report','CashFlowStatementController@show');

Route::resource('employees','EmployeeController');

Route::get('attendance','AttendanceController@index');

Route::get('attendance/attend/{id}','AttendanceController@createEmpCart');

Route::get('attendance/test','AttendanceController@getEmpCart');

Route::post('attendance/submit','AttendanceController@store');

Route::post('attendance/update','AttendanceController@update');

Route::get('invoices/','InvoicesController@index');

Route::get('invoices/create','InvoicesController@cartForm');

Route::post('invoices/create','InvoicesController@createCart');

Route::get('invoices/getCart','InvoicesController@getCart');

Route::post('invoices/','InvoicesController@store');

// Route::get('invoices/create2','InvoicesController@cartForm');
//
// Route::post('invoices/create2','InvoicesController@createCart');

Route::get('invoices/detail/{id}','InvoicesController@show');

Route::delete('invoices/detail/{id}', 'InvoicesController@destroy');

Route::post('invoices/search','InvoicesController@searchProduct');

Route::get('invoices/getCart/deleteCart', 'InvoicesController@destroyCart');

Route::post('invoices/editCart', 'InvoicesController@editCart');

Route::post('invoices/searchInvoice','InvoicesController@searchInvoice');

Route::get('payroll/','PayrollController@index');

Route::get('payroll/calculate','PayrollController@create');

Route::get('payroll/setPayrollView','PayrollController@setPayrollView');

Route::post('payroll/setPayroll','PayrollController@setPayroll');

Route::get('ledger/','GeneralLedgerController@filterDate');

Route::get('ledger/create','GeneralLedgerController@create');
