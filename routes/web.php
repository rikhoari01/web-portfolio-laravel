<?php

use App\Http\Controllers\Controller;
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

Route::get('/', [Controller::class, 'index']);
Route::get('/login', [Controller::class, 'login'])->middleware('guest')->name('login');
Route::get('/edit', [Controller::class, 'edit'])->middleware('guest');

Route::post('/signin', [Controller::class, 'signin']);
Route::post('/signout', [Controller::class, 'signout']);

Route::get('/skills/{id}', [Controller::class, 'indexSkills']);
Route::get('/works/{id}', [Controller::class, 'indexWorks']);

// Get AUTH
Route::group(['middleware' => ['auth']], function(){
    // Update
    Route::post('/user/edit', [Controller::class, 'updateUser']);
    Route::post('/home/edit', [Controller::class, 'updateHome']);
    Route::post('/home/file/edit', [Controller::class, 'homeFile']);
    Route::post('/about/edit', [Controller::class, 'updateAbout']);
    Route::post('/about/file/edit', [Controller::class, 'aboutFile']);
    Route::post('/contact/edit', [Controller::class, 'updateContact']);
    Route::post('/footer/edit', [Controller::class, 'updateFooter']);

    // Skills
    Route::post('/skills/add', [Controller::class, 'addSkills']);
    Route::post('/skills/edit', [Controller::class, 'updateSkills']);
    Route::delete('/skills/delete', [Controller::class, 'destroySkills']);

    // Works
    Route::post('/works/add', [Controller::class, 'addWorks']);
    Route::post('/works/edit', [Controller::class, 'updateWorks']);
    Route::delete('/works/delete', [Controller::class, 'destroyWorks']);
});
