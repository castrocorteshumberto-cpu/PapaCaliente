<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class JuegoController extends Controller
{
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

