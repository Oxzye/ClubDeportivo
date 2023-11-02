<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_cargo','descripcionCargo','salario_base','horas_de_trabajoxmes','horario_de_trabajo','created_at','update_at'];

    protected $primaryKey='id_cargo';
}
