<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincias extends Model
{
    use HasFactory;

    protected $table = 'provincias';
    protected $fillable = ['nombre_prov'];
    protected $primaryKey= 'id_prov';

    public function Paises() {
        return $this->belongsTo(Paises::class, 'id_pais');
    }
}
