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
