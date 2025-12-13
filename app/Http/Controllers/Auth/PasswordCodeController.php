<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendOtpMail;
use App\Models\PasswordOtp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log; // Importante para ver errores

class PasswordCodeController extends Controller
{
    // 1) Mostrar formulario de email
    public function showEmailForm()
    {
        return view('auth.forgot-password');
    }

    // 2) Enviar código al correo (AQUÍ ESTÁ LA SOLUCIÓN AL ERROR 500)
    public function send(Request $request)
    {
        // SOLUCIÓN 1: Aumentar el tiempo de espera a 120 segundos
        set_time_limit(120); 

        $request->validate(['email' => 'required|email']);

        if (!User::where('email', $request->email)->exists()) {
            return back()->withErrors(['email' => 'No encontramos ese correo.']);
        }

        // Generar código
        $code = rand(100000, 999999);

        // Guardar código (Create o Update)
        PasswordOtp::updateOrCreate(
            ['email' => $request->email], // Busca por email
            [
                'code' => $code,
                'expires_at' => Carbon::now()->addMinutes(5)
            ]
        );

        // SOLUCIÓN 2: Try-Catch para capturar el error de Gmail
        try {
            Mail::to($request->email)->send(new SendOtpMail($code));
        } catch (\Exception $e) {
            // Si falla, guardamos el error en el log y avisamos al usuario
            Log::error("Error enviando correo: " . $e->getMessage());
            return back()->withErrors(['email' => 'Error de conexión con Gmail: ' . $e->getMessage()]);
        }

        return redirect()
            ->route('password.verify', ['email' => $request->email]) // OJO: Corregí el nombre de la ruta aquí
            ->with('status', 'Te enviamos un código a tu correo.');
    }

    // 3) Formulario para ingresar código
    public function showVerifyForm(Request $request)
    {
        return view('auth.verify-code', ['email' => $request->email]);
    }

    // 4) Validar código
    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code'  => 'required|digits:6',
        ]);

        $otp = PasswordOtp::where('email', $request->email)
            ->where('code', $request->code)
            ->first();

        if (!$otp) {
            return back()->withErrors(['code' => 'Código incorrecto.']);
        }

        if (Carbon::now()->greaterThan($otp->expires_at)) {
            return back()->withErrors(['code' => 'El código expiró.']);
        }

        return redirect()->route('password.reset.form', ['email' => $request->email]);
    }
    
    // FALTABAN ESTAS DOS FUNCIONES PARA CAMBIAR LA CONTRASEÑA FINALMENTE
    
    public function resetView(Request $request) {
        return view('auth.reset-password', ['email' => $request->email]);
    }

    public function update(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->forceFill([
            'password' => bcrypt($request->password) // Encriptamos la contraseña
        ])->save();

        // Borramos el código usado
        PasswordOtp::where('email', $request->email)->delete();

        return redirect()->route('login')->with('status', '¡Contraseña restablecida con éxito!');
    }
}