<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Compra extends Model
{
    use HasFactory;

    protected $casts = [
        'produtos_id' => 'array'
    ]; 
    
    protected $guarded = []; 

    public function produtos(){
        //return $this->hasMany(Imagem::class, 'produto_id');
        return $this->hasMany('App\Models\Produto');
    }

}

