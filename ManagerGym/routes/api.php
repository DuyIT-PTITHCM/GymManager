<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::apiResource('typemachine','Api\TypeMachineController')->middleware('auth:api');
Route::apiResource('partner','Api\PartnerController')->middleware('auth:api');
Route::post('login','Api\LoginController@Login');

Route::post('register','Api\Register@Register')->middleware('auth:api');
Route::apiResource('user','Api\UserController')->middleware('auth:api','uservalidater');
Route::apiResource('department','Api\DepartmentController')->middleware('auth:api','uservalidater');
Route::apiResource('device','Api\DeviceController')->middleware('auth:api');
Route::apiResource('devicepartner','Api\PartnerDeviceController')->middleware('auth:api');
//chuc nang 1
Route::get('status/{id}','Api\StatusControler@getListFromStatus')->middleware('auth:api');

Route::get('statistical','Api\Statistical@statisticalNowBuy')->middleware('auth:api');
Route::get('statisticalsalesmonth','Api\Statistical@statisticalNowSales')->middleware('auth:api');

Route::get('statisticalbuyyear','Api\Statistical@statisticalNowYearBuy')->middleware('auth:api');
Route::get('statisticalsalesyear','Api\Statistical@statisticalNowYearSales')->middleware('auth:api');

Route::get('statisticalservice/{id}','Api\ServiceController@statisticalService')->middleware('auth:api');
Route::get('statisticalserviceyear/{id}','Api\ServiceController@statisticalServiceYear')->middleware('auth:api');
Route::post('detailservice','Api\ServiceController@detailService')->middleware('auth:api');

Route::apiResource('supplier','Api\SupplierController')->middleware('auth:api');
Route::apiResource('purchasing','Api\PurchasingController')->middleware('auth:api');