<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuegoController extends Controller
{
    // Solo alumno 1 usa este método
    public function iniciar()
    {
        $numero = 1;

        Registro::create([
            'numero' => $numero
        ]);

        $next = env('NEXT_SERVER');

        try {
            Http::post($next, [
                'numero' => $numero
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'Ganador',
                'ultimo_numero' => $numero
            ]);
        }

        return response()->json([
            'mensaje' => 'Juego iniciado',
            'numero' => $numero
        ]);
    }

    public function recibir(Request $request)
    {
        $numero = $request->input('numero') + 1;

        Registro::create([
            'numero' => $numero
        ]);

        $next = env('NEXT_SERVER');

        try {
            Http::post($next, [
                'numero' => $numero
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'Ganador',
                'ultimo_numero' => $numero
            ]);
        }

        return response()->json([
            'numero_registrado' => $numero
        ]);
    }
}

