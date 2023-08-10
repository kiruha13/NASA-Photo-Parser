<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarsRoverPhotosController;

Route::get('/mars_rover_photos', [MarsRoverPhotosController::class, 'index'])->name('index');
Route::post('/mars_rover_photos/get_photos', [MarsRoverPhotosController::class, 'getPhotos'])->name('get_photos');

Route::get('/', function () {
    return view('mars_rover_photos/index');
});
