<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleados';
    use SoftDeletes;

    public function paquetes()
    {
        return $this->belongsToMany(Paquete::class, 'creas', 'id_func', 'id_paquete');
    }
}
