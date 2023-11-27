<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detalles_Factura extends Model
{
    use HasFactory;

    protected $table = 'detalles_factura';
    protected $primaryKey = 'id_detallefactura';
    protected $fillable = ['id_tipodetallefactura','num_fac','id_act'];

    public function facturas()
    {
        return $this->belongsTo(Facturacion::class, 'num_fac');
    }
    public function actividad()
    {
        return $this->belongsTo(Actividad::class, 'id_act');
    }
    public function tipodetfact()
    {
        return $this->belongsTo(tipodetfactura::class, 'id_tipodetallefactura');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
