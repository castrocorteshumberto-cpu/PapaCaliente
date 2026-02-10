<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use Illuminate\Support\Facades\Http;

class JuegoController extends Controller
{
    public function recibir(Request $request)
    {
        $numeroRecibido = $request->input('numero');
        $numero = $numeroRecibido + 1;

        Registro::create([
            'numero' => $numero,
            'alumno' => env('ALUMNO_NOMBRE')
        ]);

        $next = env('NEXT_SERVER');

        try {
            Http::post($next, [
                'numero' => $numero
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'Ganador',
                'ultimo_numero' => $numero,
                'alumno' => env('ALUMNO_NOMBRE')
            ]);
        }

        return response()->json([
            'numero_registrado' => $numero
        ]);
    }
}    
