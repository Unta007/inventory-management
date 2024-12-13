<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BeverageController;

Route::get('/', function () {
    return view('home');
});

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::get('profile', ProfileController::class)->name('profile');

Route::get('/beverages', [BeverageController::class, 'index'])->name('beverages.index');
Route::resource('beverages', BeverageController::class);

Route::get('/beverages/create', [BeverageController::class, 'create'])->name('beverage.create');

Route::get('/beverages/{beverage}/edit', [BeverageController::class, 'edit'])->name('beverages.edit');
Route::put('/beverages/{beverage}', [BeverageController::class, 'update'])->name('beverages.update');

// Route::get('/token', function (Request $request) {
//     $token = $request->session()->token();

//     $token = csrf_token();
// });
