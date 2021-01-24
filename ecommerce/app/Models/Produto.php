<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Produto extends Model
{
    use HasFactory;


    protected $casts = [
        'informacoes' => 'array'
    ];

    protected $dates = ['date'];

    protected $guarded = []; 


    public function imagens(){
        //return $this->hasMany(Imagem::class, 'produto_id');
        return $this->hasMany('App\Models\Imagem');
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
     }

    /*public function caracteristicas(){
        return $this->belongsToMany(Caracteristica::class, 'produtos_caracteristicas_');
    }*/
}
