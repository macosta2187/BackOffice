<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class Despacha extends Model
{
    use HasFactory;
    protected $table = 'despacha_s';
    use SoftDeletes;
}
