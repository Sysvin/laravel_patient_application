<?php

use Illuminate\Support\Facades\Route;
use App\Post;
use App\Http\Controllers\PatientController;


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


Route::middleware('auth')->group(function(){

    Route::get('/select', function () {
        return view('select');
    });

    Route::post('/submitPressureForm', 'App\Http\Controllers\PatientController@submitPressureForm')->name('submitPressureForm');

    Route::get('/table', function () {
        return view('table');
    });

    Route::post('/add', 'App\Http\Controllers\PatientController@add')->name('add');

    Route::get('/view/{id}', 'App\Http\Controllers\PatientController@view')->name('view');

});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
