<?php

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

Route::get('/', 'ServiceController@git_demo_repo');
Route::get('/gitdemo', 'ServiceController@git_demo_repo');
Route::match(['get','post'],'/user/repositories', 'ServiceController@get_github_list');

