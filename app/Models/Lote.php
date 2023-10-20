<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;


class Lote extends Model
{
    protected $table = 'lotes';    
    //protected $fillable = ['paqueteId', 'lote', 'estatus','camionId'];
    use SoftDeletes;
    use HasFactory;

// Lote.php

public function paquetes()
{
    return $this->belongsToMany(Paquete::class, 'lote_paquete', 'lote_id', 'paquete_id');
}
public function camion()
{
    return $this->belongsTo(Camion::class, 'camionId');
}
  
}
