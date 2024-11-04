<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfilController;

Route::get('/', function () {
    return view('pages.auth.auth-login');
});


// Route::get('/dashboard', function () {
//     return view('pages.dashboard', ['type_menu' => 'dashboard']);

// });

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('pages.dashboard', ['type_menu' => 'home']);
    })->name('home');


    Route::resource('user', UserController::class);
    Route::resource('product', ProductController::class);

    Route::get('user/profil/{id}', [ProfilController::class, 'profil'])->name('user.profil');

});
