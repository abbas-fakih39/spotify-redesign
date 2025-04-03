<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\PlaylistController;

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/library', [LibraryController::class, 'index'])->name('library');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/favorites', [HomeController::class, 'favorites'])->name('favorites');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::get('/player/{id}', [PlayerController::class, 'show'])->name('player.show');
Route::get('/track/{id}', [PlayerController::class, 'trackView'])->name('track.view');

Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists.index');
Route::get('/playlists/create', [PlaylistController::class, 'create'])->name('playlists.create');
Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');
Route::get('/playlists/{id}', [PlaylistController::class, 'show'])->name('playlists.show');
Route::get('/playlists/{id}/edit', [PlaylistController::class, 'edit'])->name('playlists.edit');
Route::put('/playlists/{id}', [PlaylistController::class, 'update'])->name('playlists.update');
Route::delete('/playlists/{id}', [PlaylistController::class, 'destroy'])->name('playlists.destroy');