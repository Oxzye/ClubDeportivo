<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class DiasxAct extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'diasxact';

    protected $fillable = [ 'id_act', 
                            'id_dias',
                            'horario_inicio',
                            'horario_fin'];
    protected $primaryKey = 'id_diasxact';
    
    public function actividad(): BelongsTo
    {
        return $this->belongsTo(Actividad::class, 'id_act');
    }

    public function dia(): BelongsTo
    {
        return $this->belongsTo(Dias::class, 'id_dia');
    }
}