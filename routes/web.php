<?php

use App\Http\Controllers\PropertyController;
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
    return redirect('all-properties');
});

Route::post('/all-properties', [PropertyController::class, 'getAllProperties']);

Route::get('/add-property', function () {
    return view('pages.add_property');
})->middleware(['auth'])->name('add_property');

Route::post('/add-property', [PropertyController::class, 'addProperty'])->middleware(['auth'])->name('store_property');
Route::get('/my-properties', [PropertyController::class, 'getUserProperties'])->middleware(['auth'])->name('my_properties');
Route::get('/all-properties', [PropertyController::class, 'getAllProperties'])->name('all_properties');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
