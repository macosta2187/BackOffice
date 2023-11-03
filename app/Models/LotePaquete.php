<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Lote;
use App\Models\Fletes;

class LotePaquete extends Model
{
    use HasFactory;
    protected $table = 'lote_paquetes';
    use SoftDeletes;


 public function lote()
    {
        return $this->belongsTo(Lote::class, 'lote_id');
}


public function paquete()
{
    return $this->belongsTo(Paquete::class);
}

public function camiones()
{
    return $this->belongsTo(Camiones::class);
}

public function fletes()
{
    return $this->belongsToMany(Fletes::class);
}

}