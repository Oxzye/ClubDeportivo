<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmpleadosxActividad extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'empleadosxactividades';

    protected $fillable = [ 'id_emp',
                            'id_act'];
    
    protected $primaryKey ='id_exa';

    public function actividad(): BelongsTo
    {
        return $this->belongsTo(Actividad::class, 'id_act');
    }
    public function empleado(): BelongsTo
    {
        return $this->belongsTo(Empleado::class, 'id_emp');
    }
}
