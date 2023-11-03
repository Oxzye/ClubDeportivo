<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instalacion extends Model
{
    use HasFactory;
    protected $table = 'instalaciones';
    protected $fillable = ['nombre_inst', 'tipo_inst', 'capacidad_inst'];
    protected $primaryKey = 'id_inst';
}
