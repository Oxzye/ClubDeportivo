<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detalles_Factura extends Model
{
    use HasFactory;

    public function actividad(): BelongsTo
    {
        return $this->belongsTo(Actividad::class);
    }
}
