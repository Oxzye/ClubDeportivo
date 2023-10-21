<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Socio extends Model
{
    use HasFactory;

    protected $table = 'socios';

    protected $fillable = ['cuil_soc', 'fecha_asociacion', 'fecha_baja_socio', 'observaciones_soc'];

    protected $primaryKey = 'id_emp';

    public function users(): HasOne
    {

        return $this->hasOne(User::class,'id_soc');
    }
}
