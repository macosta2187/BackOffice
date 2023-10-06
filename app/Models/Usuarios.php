<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Usuarios extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
    use SoftDeletes;
}
