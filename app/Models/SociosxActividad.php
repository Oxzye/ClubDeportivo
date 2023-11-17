<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SociosxActividad extends Model
{
    use HasFactory;
    
    protected $table = 'sociosxactividades';

    protected $fillable = [ 'id_act',
                            'dni_soc',
                            'fecha_inscripcion',
                            'opinion_soc'];
    
    protected $primaryKey ='id_sxa';

    public function actividad(): BelongsTo
    {
        return $this->belongsTo(Actividad::class, 'id_act');
    }

    public function socio(): BelongsTo
    {
        return $this->belongsTo(Socio::class, 'id_soc');
    }
}
