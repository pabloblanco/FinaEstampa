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

Route::fallback(function () {
    return view('404');
});

Route::get('/101', function () {
    return view('101');
});

Route::get('/302', function () {
    return view('302');
});

Route::get('/500', function () {
    return view('500');
});

Route::get('/', 'HomeController@index')->name('home');

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

// Configuracion del ERP
Route::get('/configuration', 'ConfigurationController@index');

Route::get('/configuration/{id}', 'ConfigurationController@customerOrders');

Route::get('/configuration/{id}/show', 'ConfigurationController@showDataGrid')->name('showConfigurationDataGrid');

Route::get('/configuration/{id}/modal', 'ConfigurationController@showDataModal')->name('showConfigurationDataModal');

Route::post('/configuration/post', 'ConfigurationController@receiveData')->name('postDataConfiguration');

// Route::resource('/users', 'UsersController')->middleware('auth');
Route::get('/users', 'UsersController@index');
Route::get('/users/mostrar-info/{id}', 'UsersController@showInfo')->name('showInfo');

Route::get('/customers', 'CustomersController@index');

Route::get('/customers/{id}/show', 'CustomersController@showDataGrid')->name('showDataGrid');

Route::post('/customers/post', 'CustomersController@receiveData')->name('postData');

Route::get('/masters', 'MastersController@index');

Route::get('/masters/{id}', 'MastersController@customerOrders');

Route::get('/masters/{id}/filtered', 'MastersController@filteredOrders');

Route::get('/masters/{id}/show', 'MastersController@showDataGrid')->name('showDataGrid');

Route::get('/masters/{id}/modal', 'MastersController@showDataModal')->name('showDataModal');

Route::post('/masters/post', 'MastersController@receiveData')->name('postDataMasters');

// Edición masiva de ordenes de producción
Route::get('/editions', 'EditionsController@index');

Route::get('/editions/{id}', 'EditionsController@customerOrders');

Route::get('/editions/{id}/show', 'EditionsController@showDataGrid')->name('showEditionDataGrid');

Route::get('/editions/{id}/modal', 'EditionsController@showDataModal')->name('showEditionDataModal');

Route::post('/editions/post', 'EditionsController@receiveData')->name('postDataEditions');

// Control de procesos de ordenes de producción
Route::get('/processes', 'ProcessesController@index');

Route::get('/processes/{id}', 'ProcessesController@customerOrders');

Route::get('/processes/{id}/show', 'ProcessesController@showDataGrid')->name('showProcessDataGrid');

Route::get('/processes/{id}/modal', 'ProcessesController@showDataModal')->name('showProcessDataModal');

Route::post('/processes/post', 'ProcessesController@receiveData')->name('postDataProcesses');

Route::post('/processes/locate', 'ProcessesController@consultarEstatus')->name('postConsultarEstatus');

// Muestra las ordenes de produccion correspondientes a la orden maestra id
Route::get('/details/{id}', 'DetailsController@index');

Route::get('/details/{id}/show', 'DetailsController@showDataGrid')->name('showDataGrid');

Route::get('/details/{id}/modal', 'DetailsController@showDataModal')->name('showDataModal');

Route::post('/details/post', 'DetailsController@receiveData')->name('postDataDetails');

Route::post('/details/postImpresion', 'DetailsController@postImpresionOrdenesProduccion');

// Muestra la lista de correos del ERP
Route::get('/emailing', 'EmailingController@index');

Route::post('/emailing/post', 'EmailingController@receiveDataEmailing')->name('postDataEmailing');

// Edita el correo seleccionado del ERP
Route::get('/emailing/edit/{id}', 'EmailingController@edit');

// Crea un  nuevo correo para el ERP
Route::get('/emailing/create', 'EmailingController@create');

// Borra el correo seleccionado del ERP
Route::get('/emailing/destroy/{id}', 'EmailingController@destroy');

// Muestra la orden de produccion correspondientes a la orden de produccion id
Route::get('/productions/{id}', 'ProductionsController@index');

Route::post('/productions/dateExpress', 'ProductionsController@dateExpress');

Route::get('/pruebas', 'CustomersController@pruebas');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
