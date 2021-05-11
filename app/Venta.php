<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
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
                      'cantidad_pedido',
                      'unidad',
                      'codigo_barras',
                      'precio_compra',
                      'precio_venta',
                      'descripcion',
                      'imagen',
                      'imagen_novedad',
                      'categoria_id',
                      'flag_carrito',
                      'user_id',
                      'articulo_id',
                      'user_name',
                      ];
}
