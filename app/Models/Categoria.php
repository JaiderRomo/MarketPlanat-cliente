<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable =['nombre'];

     //uno a muchos
    public function productos(){
        return $this->hasMany('App\Models\Product');
    }
}
