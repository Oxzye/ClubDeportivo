<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';

    protected $fillable = ['id_cargo','dni_emp','cuit_emp','fecha_alta_emp','fecha_baja_emp'];

    protected $primaryKey = 'id_emp';

    public function users(): HasOne {

        return $this->hasOne(User::class,'id_emp');
    }
}
