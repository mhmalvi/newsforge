<?php

use App\Http\Controllers\Admin\BaseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
*/

require __DIR__.'/auth.php';

Route::get('dashboard', 'BaseController@index')->name('dashboard');

Route::get('categoies', 'CategoryController@index')->name('category');

/**
 * News
 */
Route::prefix('news')->group(function(){
    Route::get('/', 'NewsController@index')->name('news.index');
    Route::get('create', 'NewsController@create')->name('news.create');
});

/**
 * Settings
 */
Route::prefix('settings')->group(function(){
    Route::get('profile', 'SiteController@profileSettings')->name('profile');
    Route::get('website', 'SiteController@webSettings')->name('website');
    Route::get('admin', 'SiteController@adminSettings')->name('admin');
    Route::get('seo', 'SiteController@seoSettings')->name('seo');
});
