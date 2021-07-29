<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectViewController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ProjectController;

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
    return view('auth.login');
});
Route::get('/display',[ProjectViewController::class,"show"]);
Route::get('/contacts',[ContactsController::class,"show"]);
Route::get('/add', function () {
    return view('create');
});

route::Resource('projects',ProjectController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
