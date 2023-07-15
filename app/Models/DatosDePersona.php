<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Datosdepersona extends Model
{
    
    use SoftDeletes;
protected $table = 'DatosDePersona';
protected $primaryKey = 'id';
protected $fillable = [
    'name',
    'email',
    'phone',
    'message'
];
}