<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formas_pago extends Model
{
    use HasFactory;
    protected $table = "formas_pago";
    protected $fillable = ['forma_pago_fdp','descripcion_fdp'];
    protected $primaryKey = 'id_fdp';
}
