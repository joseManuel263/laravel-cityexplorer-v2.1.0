<?php

namespace App\Http\Controllers\Api; 

use App\Http\Controllers\Controller;
use App\Models\ListaLugar;
use Illuminate\Http\Request;

class ListaLugarController extends Controller
{
    public function index(Request $request)
    {
        // Paginación y retorno de listas de lugares
    }

    public function create(Request $request)
    {
        // Lógica para crear nueva lista de lugares
    }

    public function show($id)
    {
        // Mostrar lista de lugares
    }

    public function destroy($id)
    {
        // Eliminar lista de lugares
    }
}
