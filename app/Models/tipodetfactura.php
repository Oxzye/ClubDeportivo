<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipodetfactura extends Model
{
    use HasFactory;
    protected $table = 'tipos_detalle_factura';
    protected $primaryKey = 'id_tipodetallefactura';
    protected $fillable = ['tipodetalle', 'descripcion_tdf'];
}