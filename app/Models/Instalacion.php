<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Instalacion extends Model
{
    use HasFactory;
    
    protected $table = 'instalaciones';
    protected $fillable = ['nombre_inst', 'tipo_inst', 'capacidad_inst'];
    protected $primaryKey = 'id_inst';

    public function disponibilidades(): HasMany
    {
        return $this->hasMany(Disponibilidades::class);
    }
    public function actividades(): HasMany
    {
        return $this->hasMany(Actividad::class);
    }
}
