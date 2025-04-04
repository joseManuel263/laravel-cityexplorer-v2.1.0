<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model {
    use HasFactory;

    protected $table = 'Lista';
    protected $primaryKey = 'id_lista';
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'descripcion',
        'id_usuario'
    ];

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }

    public function lugares() {
        return $this->belongsToMany(Lugar::class, 'Lista_Lugar', 'id_lista', 'id_lugar');
    }
}
