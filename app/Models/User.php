<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'tipo_identificaciones_id',
        'password',
        'identificacion',
        'telefono',
        'email',
        'rol',
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
    ];
    public function setPasswordAttribute($password) {

        $this->attributes['password'] = bcrypt($password);
}

                            //RELACIONES
    //uno a muchos inversa

public function tipo_identificaciones(){
    return $this->belongsTo('App\Models\Tipo_identificacion');
}
    

 //uno a uno
    public function perfil(){
        return $this ->HasOne('App\Models\Perfil'); 
    }
 //uno a muchos
   public function blogs(){
    return $this->hasMany('App\Models\Blog');
   }

    public function products(){
        return $this->hasMany('App\Models\Product');
 }
}
