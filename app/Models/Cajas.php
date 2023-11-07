<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cajas extends Model
{
    use HasFactory;

    protected $table = 'cajas';
    protected $fillable = ['monto_inicial_caja', 'total_ventas_cajas', 'saldo_caja'];
    protected $primaryKey = 'id_caja';

    public function empleados() 
    {
        return $this->belongsTo(Empleado::class, 'id_emp');
    }
}
