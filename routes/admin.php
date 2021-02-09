<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

require __DIR__.'/auth.php';

Route::get('dashboard', 'BaseController@index')->name('dashboard');

/**
 * Categories
 */
Route::prefix('categories')->group(function(){
    Route::get('/', 'CategoryController@index')->name('category');
    Route::get('/all', 'CategoryController@getAll');
    Route::get('/sub', 'CategoryController@getAllSub');
    Route::post('/store', 'CategoryController@store');
});

/**
 * News
 */
Route::prefix('news')->group(function(){
    Route::get('/', 'NewsController@index')->name('news.index');
    Route::get('create', 'NewsController@create')->name('news.create');
    Route::get('trashed', 'NewsController@removed')->name('news.trashed');
});

/**
 * Settings
 */
Route::prefix('settings')->group(function(){
    Route::get('profile', 'SiteController@profileSettings')->name('profile');
    Route::post('profile', 'SiteController@profileUpdate')->name('userProfileUpdate');
    Route::get('website', 'SiteController@webSettings')->name('website');
    Route::get('admin', 'SiteController@adminSettings')->name('admin');
    Route::get('seo', 'SiteController@seoSettings')->name('seo');
});
