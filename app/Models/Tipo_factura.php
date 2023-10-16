<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_factura extends Model
{
    use HasFactory;
    protected $table = "tipos_factura";
    protected $fillable = ['tipo_fac'];
    protected $primaryKey = 'id_tipo_fac';
}
