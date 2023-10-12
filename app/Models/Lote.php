<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;


class Lote extends Model
{
    protected $table = 'lotes';    
    protected $fillable = ['paqueteId', 'lote', 'estatus','camionId'];
    use SoftDeletes;
    use HasFactory;

    public function paquetes()
    {
        return $this->belongsToMany(Paquete::class);
    }



}
