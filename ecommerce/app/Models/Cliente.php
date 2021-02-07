<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function enderecos(){
        //return $this->hasMany(Imagem::class, 'produto_id');
        return $this->hasMany('App\Models\Endereco');
    }

}
