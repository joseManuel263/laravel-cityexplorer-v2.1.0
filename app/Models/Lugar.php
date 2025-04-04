<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugar extends Model {
    use HasFactory;

    protected $table = 'Lugar';
    protected $primaryKey = 'id_lugar';
    public $timestamps = false;

    protected $fillable = [
        'paginaWeb',
        'nombre',
        'descripcion',
        'dias_servicio',
        'num_telefonico',
        'estado',
        'Horario',
        'id_direccion',
        'id_categoria',
        'id_usuario'
    ];

    public function direccion() {
        return $this->belongsTo(Direccion::class, 'id_direccion', 'id_direccion');
    }

    public function categoria() {
        return $this->belongsTo(CategoriaLugar::class, 'id_categoria', 'id_categoria');
    }

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }
}
