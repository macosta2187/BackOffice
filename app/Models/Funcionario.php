<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcionario extends Model
{
    use HasFactory;
    protected $table = 'funcionarios';
    use SoftDeletes;

    public function paquetes()
    {
        return $this->belongsToMany(Paquete::class, 'tabla_pivot', 'funcionario_id', 'paquete_id');
    }
}
