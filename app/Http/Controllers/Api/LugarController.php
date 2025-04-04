<?php

namespace App\Http\Controllers\Api; 

use App\Http\Controllers\Controller;
use App\Models\Lugar;
use Illuminate\Http\Request;

class LugarController extends Controller
{
    public function index(Request $request)
    {
        // Mostrar lugares
    }

    public function create(Request $request)
    {
        // Crear lugar
    }

    public function show($id)
    {
        // Mostrar un lugar específico
    }

    public function destroy($id)
    {
        // Eliminar un lugar
    }
}
