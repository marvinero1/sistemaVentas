<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
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
                      'imagen_novedad',
                      'categoria_nombre',
                      'flag_carrito',
                      'user_id',
                      'articulo_id',
                      'user_name'
                  ];
}
