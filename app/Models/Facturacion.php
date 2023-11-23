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
    public function Tipo_fac()
    {
        return $this->belongsTo(Tipo_factura::class, 'tipo_fac');
    }
    public function dnisocio()
    {
        return $this->belongsTo(Socio::class, 'dni_soc');
    }
    public function client()
    {
        return $this->belongsTo(clientes::class, 'dni_cli');
    }
}
