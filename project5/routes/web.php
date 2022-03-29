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

Route::get('/a', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/yu', function () {
    return view('yu');
});

Route::get('/knu', function () {
    return view('knu');
});

Route::get('/daegu', function () {
    return view('daegu');
});

Route::get('/moderna', function () {
    return view('moderna');
});

Route::get('/pfizer', function () {
    return view('pfizer');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/disease', function () {
    return view('disease');
});

Route::get('/SE', function () {
    return view('SE');
});

Route::get('/m_se1', function () {
    return view('m_se1');
});
Route::get('/m_se2', function () {
    return view('m_se2');
});
Route::get('/m_se3', function () {
    return view('m_se3');
});

Route::get('/p_se1', function () {
    return view('p_se1');
});
Route::get('/p_se2', function () {
    return view('p_se2');
});
Route::get('/p_se3', function () {
    return view('p_se3');
});

Route::get('/temp1', function () {
    return view('temp1');
});

Route::get('/temp2', function () {
    return view('temp2');
});

Route::get('/temp3', function () {
    return view('temp3');
});

