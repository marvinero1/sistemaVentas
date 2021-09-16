<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carrito_detalle extends Model
{
     protected $auditTimestamps = true;
    protected $auditStrict = true;
    protected $auditThreshold = 100;

    protected $auditEvents = [
        'created',
        'saved',
        'deleted',
        'restored',
        'updated'
    ];

    protected $fillable = ['nombre',
                            'num_comprobante',
                            
                            'cantidad_pedido',
                            'codigo_barras',
                            'precio_venta',
                            'descripcion',
                            'imagen',
                            'imagen_novedad',
                            'carro_id',
                            'categoria_id',
                            'articulo_id',
                        ];
}
