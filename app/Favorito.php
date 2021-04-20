<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
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
                        'unidad',
                        'precio_compra',
                        'precio_venta',
                        'descripcion',
                        'imagen',
                        'flag_carrito',
                        'user_id',
                        'articulos_id',
                        ];


    public function articulos(){
        return $this->belongsTo(Articulo::class);
    }
}
