<?php

namespace App\Http\Controllers\Api; 

use App\Http\Controllers\Controller;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComentarioController extends Controller
{
    /**
     * Listar comentarios.
     */
    public function index(Request $request)
    {
        $rows = (int)$request->input('rows', 10);
        $page = 1 + (int)$request->input('page', 0);

        \Illuminate\Pagination\Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });

        $comentarios = Comentario::paginate($rows);

        return response()->json([
            'estatus' => 1,
            'data' => $comentarios->items(),
            'total' => $comentarios->total(),
        ]);
    }

    /**
     * Crear un nuevo comentario.
     */
    public function create(Request $request)
    {
        // Validación de datos
        $validator = Validator::make($request->all(), [
            'contenido' => 'required|string',
            'valoracion' => 'required|integer|between:1,5',
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'id_lugar' => 'required|exists:lugares,id_lugar',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'estatus' => 0,
                'mensaje' => $validator->errors(),
            ], 422);
        }

        // Crear el comentario
        $comentario = Comentario::create($request->all());

        return response()->json([
            'estatus' => 1,
            'mensaje' => 'Comentario registrado con éxito',
            'data' => $comentario,
        ], 201);
    }

    /**
     * Mostrar un comentario específico.
     */
    public function show($id)
    {
        $comentario = Comentario::find($id);

        if (!$comentario) {
            return response()->json([
                'estatus' => 0,
                'mensaje' => 'Comentario no encontrado',
            ], 404);
        }

        return response()->json([
            'estatus' => 1,
            'data' => $comentario,
        ]);
    }

    /**
     * Actualizar un comentario.
     */
    public function update(Request $request, $id)
    {
        $comentario = Comentario::find($id);

        if (!$comentario) {
            return response()->json([
                'estatus' => 0,
                'mensaje' => 'Comentario no encontrado',
            ], 404);
        }

        // Validación de datos
        $validator = Validator::make($request->all(), [
            'contenido' => 'nullable|string',
            'valoracion' => 'nullable|integer|between:1,5',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'estatus' => 0,
                'mensaje' => $validator->errors(),
            ], 422);
        }

        // Actualizar campos
        $comentario->update($request->only(['contenido', 'valoracion']));

        return response()->json([
            'estatus' => 1,
            'mensaje' => 'Comentario actualizado con éxito',
            'data' => $comentario,
        ]);
    }

    /**
     * Eliminar un comentario.
     */
    public function destroy($id)
    {
        $comentario = Comentario::find($id);

        if (!$comentario) {
            return response()->json([
                'estatus' => 0,
                'mensaje' => 'Comentario no encontrado',
            ], 404);
        }

        $comentario->delete();

        return response()->json([
            'estatus' => 1,
            'mensaje' => 'Comentario eliminado con éxito',
        ]);
    }
}