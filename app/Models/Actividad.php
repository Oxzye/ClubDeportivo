<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividades';
    protected $fillable = [ 'id_diasxact', 
                            'id_deporte', 
                            'id_instalaciones', 
                            'id_empleadosxactividad', 
                            'nombre_act', 'limite_soc_atc', 
                            'descripcion_act', 
                            'actividad_en_curso', 
                            'fecha_inicio_act', 
                            'fecha_fin_act'];
                            
    protected $primaryKey = 'id_act';

     // Actividas recibe mucho a uno
    public function instalacion(): BelongsTo
    {
        return $this->belongsTo(Instalacion::class);
    }
    public function deporte(): BelongsTo
    {
        return $this->belongsTo(Deporte::class);
    }
    // Actividad manda uno a mucho
    public function diasxactividades(): HasMany
    {
        return $this->hasMany(DiasxAct::class);
    }
    public function sociosxactividades(): HasMany
    {
        return $this->hasMany(SociosxActividad::class);
    }
    public function detallesfacturas(): HasMany
    {
        return $this->hasMany(Detalles_Factura::class);
    }
    public function empleadosxactividades(): HasMany
    {
        return $this->hasMany(EmpleadosxActividad::class);
    }

}
