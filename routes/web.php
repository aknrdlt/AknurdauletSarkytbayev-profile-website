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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/main', function () {
    return view('main');
})-> name('main');

Route::get('/skills', function () {
    return view('skills');
}) -> name('skills');

Route::get('/services', function () {
    return view('services');
}) ->name('services');

Route::get('/contacts', function () {
    return view('contacts');
}) -> name('contacts');
