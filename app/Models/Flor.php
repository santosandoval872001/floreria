<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flor extends Model
{
    protected $table = 'flores';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'imagen',
        'disponible',
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'disponible' => 'boolean',
    ];
}
