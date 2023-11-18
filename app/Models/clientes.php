<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'id_loc', 
        'cod_genero', 
        'nombre_cli',
        'apellido_cli',
        'domicilio_cli',
        'telefono_cli',
        'fecha_nac_cli',
        'email_cli',
        'observaciones'
    ];						
        protected $primaryKey = 'dni_cli';

        public function generos() {
            return $this->belongsTo(generos::class, 'cod_genero');
        }
        
        public function Localidades() {
            return $this->belongsTo(Localidades::class, 'id_loc');
        }
}
