<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;


class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    use SoftDeletes;
   
}
