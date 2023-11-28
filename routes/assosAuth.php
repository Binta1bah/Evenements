<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssosAuth\PasswordController;
use App\Http\Controllers\AssosAuth\NewPasswordController;
use App\Http\Controllers\AssosAuth\VerifyEmailController;
use App\Http\Controllers\AssosAuth\RegisteredAssosController;
use App\Http\Controllers\AssosAuth\PasswordResetLinkController;
use App\Http\Controllers\AssosAuth\ConfirmablePasswordController;
use App\Http\Controllers\AssosAuth\AuthenticatedSessionController;
use App\Http\Controllers\AssosAuth\EmailVerificationPromptController;
use App\Http\Controllers\AssosAuth\EmailVerificationNotificationController;

Route::middleware('guest:association')->group(function () {

    Route::get('register/assos', [RegisteredAssosController::class, 'create'])->name('incsiptionAssos');

    Route::post('register/assos', [RegisteredAssosController::class, 'store'])->name('registerAssos');

    Route::get('login/assos', [AuthenticatedSessionController::class, 'create'])->name('connexionAssos');

    Route::post('assos/login', [AuthenticatedSessionController::class, 'store'])->name('assos.login');

    Route::get('assos/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('assos.password.request');

    Route::post('assos/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('assos.password.email');

    Route::get('assos/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('assos.password.reset');

    Route::post('assos/reset-password', [NewPasswordController::class, 'store'])
        ->name('assos.password.store');
});

Route::middleware('auth:association')->group(function () {
    Route::get('assos/verify-email', EmailVerificationPromptController::class)
        ->name('assos.verification.notice');

    Route::get('assos/verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('assos.verification.verify');

    Route::post('assos/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('assos.verification.send');

    Route::get('assos/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('assos.password.confirm');

    Route::post('assos/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('assos/password', [PasswordController::class, 'update'])->name('assos.password.update');

    Route::post('assos/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('assos.logout');
});
