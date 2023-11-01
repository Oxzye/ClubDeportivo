<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';

    protected $fillable = ['id_cargo','cuit_emp','fecha_alta_emp','fecha_baja_emp'];

    protected $primaryKey = 'id_emp';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
