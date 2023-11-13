<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dias extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_dia'];
    protected $primaryKey = 'id_dia';

    public function disponibilidades(): HasMany
    {
        return $this->hasMany(Disponibilidades::class);
    }
}
