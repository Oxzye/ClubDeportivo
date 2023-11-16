<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class DiasxAct extends Model
{
    use HasFactory;

    protected $table = 'diasxact';

    protected $fillable = [ 'id_act', 
                            'id_dias',
                            'horario_inicio',
                            'horario_fin'];
    protected $primaryKey = 'id_diasxact';
    
    public function actividad(): BelongsTo
    {
        return $this->belongsTo(Actividad::class);
    }
}