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

Route::prefix('admin')->group(function(){
    Route::get('tintuc', 'NewsController@index');
    Route::get('sua-tintuc/{id}', 'NewsController@editNews');
    Route::post('sua-tintuc/{id}', 'NewsController@postEditNews');
    Route::get('them-tintuc','NewsController@addNews' );
    Route::post('them-tintuc','NewsController@postAddNews' );
    Route::get('xoa-tintuc/{id}','NewsController@deleteNews' );
});
