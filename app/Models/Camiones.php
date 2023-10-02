<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Camiones extends Model
{
    use HasFactory;
    protected $table = 'camiones';
    protected $fillable = ['id_camion'];
    use SoftDeletes;
}
