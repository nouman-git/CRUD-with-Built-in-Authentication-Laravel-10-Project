<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\ManufacturersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypesController;
use App\Models\Manufacturer;
use App\Models\Type;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




//CARS
Route::get('/cars/clearfilter', [CarsController::class, 'clearFilters'])
    ->name('cars.clearfilter')
    ->middleware(['auth', 'verified']);

// Route::get('/cars/filters' , [CarsController::class , 'filterPage'])->name('cars.filterpage')->middleware(['auth', 'verified']);

// Route::post('/cars/applyfilter' , [CarsController::class , 'applyFilter'])->name('cars.applyfilter')->middleware(['auth', 'verified']);


Route::get('/cars/deletepage/{id}' , [CarsController::class , 'deletePage'])->name('cars.deletepage')->middleware(['auth', 'verified']);
Route::resource('/cars', CarsController::class)->middleware(['auth', 'verified']);

//Manufacturers
Route::get('/manufacturers/deletepage/{id}' , [ManufacturersController::class , 'deletePage'])->name('manufacturers.deletepage')->middleware(['auth', 'verified']);
Route::resource('/manufacturers', ManufacturersController::class)->middleware(['auth', 'verified']);



//vehicles
Route::get('/vehicles/deletepage/{id}' , [TypesController::class , 'deletePage'])->name('vehicles.deletepage')->middleware(['auth', 'verified']);
Route::resource('/vehicles', TypesController::class)->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
