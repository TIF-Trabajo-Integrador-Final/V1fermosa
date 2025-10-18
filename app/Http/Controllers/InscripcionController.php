<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudInscripcion;
use App\Models\Carrera; // Asumimos que este modelo existe para cargar opciones

class InscripcionController extends Controller
{
    /**
     * Muestra la página de Inscripción con requisitos y formulario.
     */
    public function index()
    {
        // Intenta cargar las carreras para el dropdown. 
        // Se usa un bloque try-catch para evitar fallos si la tabla 'carreras' no existe aún.
        try {
            $carreras = Carrera::all();
        } catch (\Throwable $e) {
            $carreras = collect([]); // Colección vacía como fallback
        }

        return view('inscripcion.index', compact('carreras'));
    }

    /**
     * Procesa la solicitud de inscripción enviada por el formulario.
     */
    public function store(Request $request)
    {
        // 1. Validación de datos obligatoria
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:50',
            'carrera_interes' => 'required|string|max:255',
            'mensaje' => 'nullable|string',
        ]);

        // 2. Creación del registro en la base de datos
        try {
            SolicitudInscripcion::create([
                'nombre_completo' => $request->nombre_completo,
                'email' => $request->email,
                'telefono' => $request->telefono,
                'carrera_interes' => $request->carrera_interes,
                'mensaje' => $request->mensaje,
                'procesado' => false, // Por defecto, no procesado
            ]);

            // 3. Redirección con mensaje de éxito
            return redirect()->route('inscripcion')
                ->with('success', '¡Tu solicitud de inscripción ha sido recibida con éxito! Nos contactaremos contigo a la brevedad.');
                
        } catch (\Exception $e) {
            // Manejo de errores
            \Log::error("Error al guardar solicitud de inscripción: " . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Hubo un error al procesar tu solicitud. Por favor, intenta de nuevo.');
        }
    }
}
