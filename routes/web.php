<?php

use Illuminate\Support\Facades\Route;

// Rutas públicas
Route::get('/', function () {
    return view('welcome');
});


Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', 'UserController@edit');
    Route::post('/profile', 'UserController@update');
    Route::get('/password/reset', 'PasswordResetController@showResetForm')->name('password.reset');
    Route::post('/password/email', 'PasswordResetController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset/{token}/{email}', 'PasswordResetController@showResetPasswordForm')->name('password.reset.token');
    use App\Http\Controllers\ProfileController;
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

?>