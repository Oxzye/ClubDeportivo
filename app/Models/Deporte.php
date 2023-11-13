<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deporte extends Model
{
    use HasFactory;
    protected $fillable = ['nombreDep', 'M_F_Mixto', 'descripcionDep'];
    protected $primaryKey = 'id_dep';
}
