<?php

use Illuminate\Support\Facades\Route;

// Controladores de autenticación Breeze
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\PasswordController;

// Controladores personalizados OTP
use App\Http\Controllers\Auth\PasswordCodeController;
use App\Http\Controllers\Auth\NewPasswordController;

/*
|--------------------------------------------------------------------------
| RUTAS PARA INVITADOS
|--------------------------------------------------------------------------
|
| Usuarios NO autenticados: login, registro, recuperación de contraseña, etc.
|
*/

Route::middleware('guest')->group(function () {

    /* ============================
       LOGIN
    ============================= */

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->name('login.store');


    /* ============================
       REGISTRO (si lo usás)
    ============================= */

    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store'])
        ->name('register.store');


    /* ============================
       RECUPERACIÓN DE CONTRASEÑA - SISTEMA OTP
    ============================= */

    // 1) Mostrar formulario de "Olvidé mi contraseña"
   // 1) Formulario para pedir correo
    Route::get('forgot-password', [PasswordCodeController::class, 'showEmailForm'])
        ->name('password.request');

    // 2) Enviar código OTP
    Route::post('forgot-password', [PasswordCodeController::class, 'send'])
        ->name('password.code.send');

    // 3) Vista para ingresar código
    Route::get('verify-code', [PasswordCodeController::class, 'showVerifyForm'])
        ->name('verify.code.form');

    // 4) Validar código
    Route::post('verify-code', [PasswordCodeController::class, 'verify'])
        ->name('verify.code');

    // 5) Formulario nueva contraseña
    Route::get('reset-password', [NewPasswordController::class, 'create'])
        ->name('password.reset.form');

    // 6) Guardar nueva contraseña
    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.reset.save');
});



/*
|--------------------------------------------------------------------------
| RUTAS PARA USUARIOS AUTENTICADOS
|--------------------------------------------------------------------------
|
| Confirmación de contraseña, verificación de email, actualizar contraseña,
| cerrar sesión, etc.
|
*/

Route::middleware('auth')->group(function () {

    /* ============================
       VERIFICACIÓN DE EMAIL
    ============================= */

    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');


    /* ============================
       CONFIRMAR CONTRASEÑA
    ============================= */

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store'])
        ->name('password.confirm.store');


    /* ============================
       CAMBIAR CONTRASEÑA (desde perfil)
    ============================= */

    Route::put('password', [PasswordController::class, 'update'])
        ->name('password.update');


    /* ============================
       LOGOUT
    ============================= */

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
