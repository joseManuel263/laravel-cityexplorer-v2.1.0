<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaLugar extends Model {
    use HasFactory;

    protected $table = 'Lista_Lugar';
    protected $primaryKey = 'id_lista_lugar';
    public $timestamps = false;

    protected $fillable = [
        'id_lista',
        'id_lugar'
    ];

    public function lista() {
        return $this->belongsTo(Lista::class, 'id_lista', 'id_lista');
    }

    public function lugar() {
        return $this->belongsTo(Lugar::class, 'id_lugar', 'id_lugar');
    }
}
