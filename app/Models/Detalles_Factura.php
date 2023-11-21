<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detalles_Factura extends Model
{
    use HasFactory;

    protected $table = 'detalles_factura';
    protected $fillable = ['precio_df'];
    protected $primaryKey = 'id_detallefactura';

    public function facturas()
    {
        return $this->belongsTo(Facturacion::class, 'num_fac');
    }
    public function actividad(): BelongsTo
    {
        return $this->belongsTo(Actividad::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
