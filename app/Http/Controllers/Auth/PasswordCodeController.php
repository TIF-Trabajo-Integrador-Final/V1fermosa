<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendOtpMail;
use App\Models\PasswordOtp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class PasswordCodeController extends Controller
{
    // 1) Mostrar formulario de email
    public function showEmailForm()
    {
        return view('auth.forgot-password');
    }

    // 2) Enviar código al correo
    public function send(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        if (!User::where('email', $request->email)->exists()) {
            return back()->withErrors(['email' => 'No encontramos ese correo.']);
        }

        // Generar código
        $code = rand(100000, 999999);

        // Guardar código
        PasswordOtp::create([
            'email'      => $request->email,
            'code'       => $code,
            'expires_at' => Carbon::now()->addMinutes(5),
        ]);

        // Enviar correo
        Mail::to($request->email)->send(new SendOtpMail($code));

        return redirect()
            ->route('verify.code.form', ['email' => $request->email])
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
}
