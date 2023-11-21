<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;



class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;
    protected $fillable = [
        'email',
        'password',
        'name',
        'apellido',
        'dni',
        'id_loc',
        'cod_genero',
        'fecha_nac',
        'domicilio',
        'telefono',
        'update_at',
        'created_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function empleado()
    {
        return $this->hasOne(Empleado::class)->withTrashed();
    }

    public function socio()
    {
        return $this->hasOne(Socio::class, 'id_user')->withTrashed();
    }

    public function genero()
    {
        return $this->belongsTo(generos::class, 'cod_genero');
    }
}
