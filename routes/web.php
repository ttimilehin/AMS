<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('home', 'HomeController@index')->name('home');
Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('getTable', 'HomeController@getTable')->name('getTable');

//Asset
Route::get('asset', 'AssetController@index')->name('asset.index');
Route::get('custodian', 'CustodianController@index')->name('custodian.index');


// Route::resource('custodian', 'CustodianController');
// Route::resource('asset', 'AssetController');


Route::group(['prefix' => 'custodian', 'middleware'=>['auth', 'custodian']], function(){
    Route::get('custodian/create', 'CustodianController@create')->name('custodian.create');
    Route::get('custodian/{id}', 'CustodianController@show')->name('custodian.show');
    Route::post('custodian', 'CustodianController@store')->name('custodian.store');
    Route::get('asset/create', 'AssetController@create')->name('asset.create');
    Route::post('asset', 'AssetController@store')->name('asset.store');
    Route::get('asset/{id}', 'AssetController@show')->name('asset.show');
    Route::get('asset/edit/{id}', 'AssetController@edit')->name('asset.edit');
    Route::post('asset/update/{id}', 'AssetController@update')->name('asset.update');
});

Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'admin']], function(){
    Route::get('custodian/edit/{id}', 'CustodianController@edit')->name('custodian.edit');
    Route::post('custodian/update/{id}', 'CustodianController@update')->name('custodian.update');
    Route::get('unassignasset/{id}', 'CustodianController@unassign_asset')->name('unassignasset');//Unassign
    Route::post('reassignasset/{id}', 'HomeController@reassign_asset')->name('reassignasset');//Reassign
    Route::get('reassignedasset', 'HomeController@reassigned_asset')->name('reassignedasset');//Reassign
    Route::get('unassignedasset', 'HomeController@unassigned_assets')->name('unassignedasset');//Unassigned
    Route::post('choosecustodian/{id}', 'CustodianController@choosecustodian')->name('choosecustodian');
    Route::get('password', 'HomeController@password')->name('password');
    Route::post('updateaddress', 'HomeController@updateAddress')->name('updateaddress');
    Route::put('updatepassword', 'HomeController@updatePassword')->name('updatepassword');
    Route::get('viewbymdas', 'HomeController@viewbymdas')->name('viewbymdas');
    Route::get('createmda', 'HomeController@createmda')->name('mda.create');
    Route::post('addmda', 'HomeController@addmda')->name('addmda');
    Route::get('getmda/{id}', 'HomeController@getmda')->name('getmda');
    Route::get('mdaassets/{id}', 'HomeController@mdaassets')->name('mdaassets');
    Route::get('search', 'HomeController@search')->name('search');
    Route::get('assetsearch', 'HomeController@assetsearch')->name('assetsearch');
});

Route::get('/', function () {
    return view('welcome');
});


Route::get('registerr', 'HomeController@register')->name('registerr');

Route::get('logout', 'HomeController@logout')->name('logout');
Auth::routes();
