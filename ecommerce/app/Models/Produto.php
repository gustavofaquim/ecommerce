<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;



    protected $dates = ['date'];

    protected $guarded = []; 


    public function imagens(){
        return $this->asMany(Imagem::class);
    }
}
