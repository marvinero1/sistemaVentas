<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
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
                            'tipo_comprobante',
                            'num_comprobante',
                            'fecha',
                            'cantidad',
                            'codigo_barras',
                            'unidad',
                            'precio_compra',
                            'precio_venta',
                            'imagen',
                            'imagen_novedad',
                            'flag_carrito',
                            'categoria_id',
                            'proveedor_id',
                            'descripcion',
                            'user_id'];
}
