<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidades extends Model
{
    use HasFactory;

    protected $table = 'localidades';
    protected $fillable = ['nombre_loc', 'cod_postal'];
    protected $primaryKey = 'id_loc';

    public function Provincias() {
        return $this->belongsTo(Provincias::class, 'id_prov');
    }
}
