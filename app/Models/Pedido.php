<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\PedidosDetalle;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'nombre_cliente',
        'telefono',
        'email',
        'direccion',
        'mensaje',
        'total',
        'estado',
        'pago',
        'metodo_pago',
    ];

    public function detalles()
    {
        return $this->hasMany(PedidosDetalle::class);
    }
}
