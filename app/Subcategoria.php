<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
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
                        'descripcion',
                        'categoria_id'];

    public function categoria(){
        return $this->hasOne(Categoria::class,'id',  'categoria_id');
    }
}
