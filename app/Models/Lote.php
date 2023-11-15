<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;


class Lote extends Model
{
    protected $table = 'lotes';       
    use SoftDeletes;
    use HasFactory;



public function paquetes()
{
    return $this->belongsToMany(Paquete::class, 'lote_paquetes', 'lote_id', 'paquete_id');
}
public function camion()
{
    return $this->belongsTo(Camiones::class, 'id_camion');
}
  
}
