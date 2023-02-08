<?php

// use App\Http\Controllers\UserController;
// use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Admin\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(
    [
        'prefix' => 'admin',
        // 'namespace' => 'Admin',
    ],
    function () {
        // Route::Resource('/', UserController::class, ['as' => 'admin']);
        Route::resource('admin', UserController::class, ['as' => 'admin']);
    }
);
// Route::Resource('/', UserController::class);
// Route::get('/', [UserController::class, 'show']);
