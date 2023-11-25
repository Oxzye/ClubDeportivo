<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Socio extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'socios';

    protected $fillable = ['cuil_soc',
                            'id_user',
                            'fecha_asociacion', 
                            'fecha_baja_socio', 
                            'observaciones_soc',
                            'updated_at',
                            'created_at',
                            'enabled',
                            'deleted_at'
                        ];

    protected $primaryKey = 'id_soc';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user')->withTrashed();
    }
    public function getStatusText()
    {
        return $this->enabled ? 'Activo' : 'Inactivo';
    }
    public function sociosxactividades(): HasMany
    {
        return $this->hasMany(SociosxActividad::class);
    }
    public function facturas()
    {
        return $this->hasMany(Facturacion::class, 'num_fac');
    }
}
