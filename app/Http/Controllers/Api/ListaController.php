<?php

namespace App\Http\Controllers\Api; 

use App\Http\Controllers\Controller;
use App\Models\Lista;
use Illuminate\Http\Request;

class ListaController extends Controller
{
    public function index(Request $request)
    {
        // Lógica para retornar listas
    }

    public function create(Request $request)
    {
        // Lógica para crear nueva lista
    }

    public function show($id)
    {
        // Mostrar lista específica
    }

    public function destroy($id)
    {
        // Eliminar lista
    }
}
