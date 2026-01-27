<?php

use App\Models\User;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/users', function(Request $request) {
    return User::all();
});

Route::post('/add_album_with_tracks', [AlbumController::class, 'addAlbum'])->name('add.album');

Route::get('/', function () {
    return Album::all();
});