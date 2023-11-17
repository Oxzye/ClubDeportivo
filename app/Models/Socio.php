<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Socio extends Model
{
    use HasFactory;

    protected $table = 'socios';

    protected $fillable = ['cuil_soc',
                            'id_user',
                            'fecha_asociacion', 
                            'fecha_baja_socio', 
                            'observaciones_soc',
                            'updated_at',
                            'created_at'
                        ];

    protected $primaryKey = 'id_soc';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function sociosxactividades(): HasMany
    {
        return $this->hasMany(SociosxActividad::class);
    }
}
