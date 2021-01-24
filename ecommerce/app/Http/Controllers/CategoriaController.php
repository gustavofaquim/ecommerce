<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function create(){
        return view('categorias.create');
    }

    public function store(Request $request){
       $categoria = new Categoria(); 
       $categoria->nome = $request->nome;
       $categoria->descricao = $request->descricao;

       $categoria->save();

       return redirect('/')->with('msg', 'Categoria salva com sucesso');
    }
}
