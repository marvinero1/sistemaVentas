<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
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
                            'imagen',
                            'categoria_id',
                            'proveedor_id',
                            'descripcion',
                            'user'];
    
    public function categoria(){
        return $this->hasOne(Categoria::class,'id');
    }

    public function proveedor(){
        return $this->hasOne(Proveedor::class,'id','proveedor_id');
    }
}
