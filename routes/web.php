<?php

use App\Http\Controllers\Admins\CategoryController;
use App\Http\Controllers\Admins\DashboardController;
use App\Http\Controllers\Admins\ProductsController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;
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

Route::get('/', [Controller::class, 'view']);


Route::get('/home', [Controller::class, 'view'])
    ->name('home');
require __DIR__.'/auth.php';

Route::get('/notAllowed', function (){
    return "You Don't Have Permission To Visit This Page!";
});


// Email Verification -------------------------------------------------

Route::get('/email/verify', [EmailVerificationController::class, 'show'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'request'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');


Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware('auth', 'throttle:6,1')
    ->name('verification.send');



// Password Reset ----------------------------------------------------------------

Route::get('/forgot-password', [PasswordResetLinkController::class , 'create'])
    ->middleware('guest')
    ->name('password.request');


Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');




Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');



// Admins -----------------------------------------------------------------------------------
Route::middleware('admin')->group(function () {

    Route::get('product/{user:username}/dashboard', [DashboardController::class, 'show'])
        ->name('product.dashboard');


    Route::get('product/create', [ProductsController::class, 'create'])
        ->name('product.create');

    Route::post('product/create', [ProductsController::class, 'store']);


    Route::get('category/create', [CategoryController::class, 'create'])
        ->name('category.create');
    Route::post('category/create', [CategoryController::class, 'store']);


    Route::get('product/{product}/edit', [ProductsController::class, 'edit'])
        ->name('product.edit');
    Route::post('product/{product}/edit', [ProductsController::class, 'update']);


    Route::get('product/{product}/delete', [ProductsController::class, 'delete'])
        ->name('product.delete');

});

Route::get('categories/{category:name}', [CategoryController::class, 'view'])
    ->name('category');

Route::get('product/{id}', [ProductsController::class, 'view']);
