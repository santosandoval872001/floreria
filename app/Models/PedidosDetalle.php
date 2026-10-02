<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PedidosDetalle extends Model
{
    protected $table = 'pedidos_detalles';

    protected $fillable = [
        'pedido_id',
        'flor_id',
        'cantidad',
        'precio',
        'subtotal',
    ];

    public function pedido(): BelongsTo
    {
        return $this->belongsTo(Pedido::class);
    }

    public function flor(): BelongsTo
    {
        return $this->belongsTo(Flor::class);
    }
}
