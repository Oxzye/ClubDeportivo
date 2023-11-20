<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'empleados';

    protected $fillable = [ 'id_cargo',
                            'id_user',
                            'cuit_emp',
                            'fecha_alta_emp',
                            'fecha_baja_emp',
                            'deleted_at',
                            ];

    protected $primaryKey = 'id_emp';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user')->withTrashed();
    }

    public function cargo()
    {
        return $this->belongsTo(Cargos::class, 'id_cargo');
    }

}
