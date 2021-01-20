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
    //Tin Tức
    Route::get('/','NewsController@index');
    Route::get('filter_cate','NewsController@filterCate');
    Route::get('tintuc', 'NewsController@index');
    Route::get('sua-tintuc/{id}', 'NewsController@editNews');
    Route::post('sua-tintuc/{id}', 'NewsController@postEditNews');
    Route::get('them-tintuc','NewsController@addNews' );
    Route::post('them-tintuc','NewsController@postAddNews' );
    Route::get('delete_modal','NewsController@deleteModal' );
    Route::get('xoa-tintuc/{id}','NewsController@deleteNews' );

    // Chuyên mục
    Route::get('chuyenmuc', 'CategoriesController@index');
    Route::get('them-chuyenmuc', 'CategoriesController@addCategories');
    Route::post('them-chuyenmuc', 'CategoriesController@postAddCategories');
    Route::get('sua-chuyenmuc/{id}', 'CategoriesController@editCategories');
    Route::post('sua-chuyenmuc/{id}', 'CategoriesController@postEditCategories');
    Route::get('xoa-chuyenmuc/{id}', 'CategoriesController@deleteCategories');
});


