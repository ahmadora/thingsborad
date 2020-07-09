<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tenant', 'Tenant\TenantController@index');///tenant
Route::get('/getToken', 'HomeController@userLogin')->name('takeToken');////tenant
Route::get('/create', 'Tenant\TenantController@create');///tenant
Route::get('/show', 'Tenant\TenantController@show');///tenant
Route::get('/service', 'Tenant\TenantController@service')->name('tenantServices');////tenant
Route::post('/createCustomer', 'Tenant\TenantController@createCustomer')->name('createCustomer');////tenant

Route::middleware('auth')->group(function () {
    Route::prefix('tenant')->group(function () {
//        Route::get('/home', 'HomeController@index')->name('home');

    });
});
