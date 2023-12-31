<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disponibilidades extends Model
{   
    use HasFactory;
    use SoftDeletes;

    protected $table = 'disponibilidad_instalaciones';

    protected $fillable = ['id_inst', 'id_dia', 'horariodisp'];

    protected $primaryKey = 'id_disp';
    
    // public function Dias() {
    //     return $this->belongsTo(Dias::class);
    // }
    
    // public function Instalaciones() {
    //     return $this->belongsTo(Instalacion::class);
    // }

    public function instalacion(): BelongsTo
    {
        return $this->belongsTo(Instalacion::class, 'id_inst');
    }

    public function dia(): BelongsTo
    {
        return $this->belongsTo(Dias::class, 'id_dia');
    }
}
