<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model {
    use HasFactory;

    protected $table = 'Pago';
    protected $primaryKey = 'id_pago';
    public $timestamps = false;

    protected $fillable = [
        'id_usuario',
        'id_lugar',
        'monto',
        'metodo_pago'
    ];

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }

    public function lugar() {
        return $this->belongsTo(Lugar::class, 'id_lugar', 'id_lugar');
    }
}
