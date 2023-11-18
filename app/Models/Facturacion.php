<?php

namespace App\Models;

use App\Http\Controllers\CajasController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
    use HasFactory;

    protected $table = 'facturas';
    protected $fillable = ['monto_fac', 'pagada_fac'];
    protected $primaryKey = 'num_fac';

    public function cajas() 
    {
        return $this->belongsTo(Cajas::class, 'id_caja');
    }
    public function formas_pago()
    {
        return $this->belongsTo(Formas_pago::class, 'id_fdp');
    }
    public function tipo_fac()
    {
        return $this->belongsTo(Tipo_factura::class, 'id_tipo_fac');
    }
    public function dnisocio()
    {
        return $this->belongsTo(Socio::class, 'id_socio');
    }
    public function dni_cli()
    {
        return $this->belongsTo(clientes::class, 'dni_cli');
    }
}
