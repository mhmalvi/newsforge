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
    Route::get('/all', 'CategoryController@getAllCategories');
    Route::post('/store', 'CategoryController@store');
    Route::delete('/delete', 'CategoryController@removeCategories');
});

Route::prefix('subcategories')->group(function(){
    Route::get('/', 'CategoryController@getAllSubcategories');
    Route::delete('/delete', 'CategoryController@removeSubcategories');
});

/**
 * News
 */
Route::prefix('news')->name('news.')->group(function(){
    Route::get('/', 'NewsController@index')->name('index');
    Route::get('create', 'NewsController@create')->name('create');
    Route::post('store', 'NewsController@store')->name('store');
    Route::get('trashed', 'NewsController@removed')->name('trashed');
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
    
    Route::post('maintenance', 'SiteController@toggleMaintenance')->name('mainTenance');
});
