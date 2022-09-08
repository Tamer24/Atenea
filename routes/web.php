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

use App\Http\Controllers\UserController;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> parent of b077873 (authentication first commit)
 
Route::get('/user', [UserController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});
=======
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

Route::redirect('/', '/user');

Route::get('login', [LoginController::class, 'welcome']);
Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@do']);
Route::get('user', [UserController::class, 'home'])->middleware('auth');
Route::get('user/test', [UserController::class, 'welcome'])->middleware('auth');
>>>>>>> parent of 643b77d (login develop)


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
<<<<<<< HEAD

Route::get('pages', function(){
    return view('pages');
});
=======
>>>>>>> parent of b077873 (authentication first commit)
