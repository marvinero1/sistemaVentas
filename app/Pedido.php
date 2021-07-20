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

  protected $fillable = ['estado',
                        'file',
                        'descripcion',
                        'precio',
                        'carrito_id',
                        'user_id'];

  public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
