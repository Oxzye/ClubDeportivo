<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deporte extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = ['nombreDep', 'M_F_Mixto', 'descripcionDep'];
    protected $primaryKey = 'id_dep';

    public function actividades(): HasMany
    {
        return $this->hasMany(Actividad::class);
    }
}
