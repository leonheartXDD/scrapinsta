<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstagramController;

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
    return view('welcome', ['name' => 'Samantha']);
});


Route::get(
    '/profile/{profile}/{number}',
    [InstagramController::class, 'profile']
);

Route::get(
    '/without/{profile}/{number}',
    [InstagramController::class, 'withoutPackage']
);
