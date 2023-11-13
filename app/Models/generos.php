<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class generos extends Model
{
    use HasFactory;
    protected $table = 'generos';
    protected $primaryKey = 'cod_genero';
    protected $fillable = ['tipo_genero', 'abreviatura_genero'];

    public function user(){
        return $this->hasMany(User::class, 'cod_genero');
    }
}
