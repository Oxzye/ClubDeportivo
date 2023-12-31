<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_pais'];
    protected $primaryKey = 'id_pais';
    protected $table = 'paises';
}
