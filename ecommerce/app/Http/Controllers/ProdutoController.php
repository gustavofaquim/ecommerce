<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index(){

        $produtos = Produto::all();

        return view('index', ['produtos' => $produtos]);

    }

    public function create(){
        return view('produtos.create');
    }

    public function store(Request $request){
        $produto = new Produto();
        $produto->codigo = $request->codigo;
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->valor_venda = $request->valor_venda;
        $produto->valor_compra = $request->valor_compra;
        $produto->ativo = $request->ativo;

        if($request->ativo){
            $produto->ativo = True;
        }
        else{
            $produto->ativo = False;
        }

        //imagem
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImagem = $request->imagem;

            $extensao = $requestImagem->extension();

            $nomeImagem = md5($requestImagem->getClientOriginalName() . strtotime('now')) . "." . $extensao;

            $requestImagem->move(public_path('img/produtos'), $nomeImagem);
        }

        //$imagem = Imagem::findOrFail(4);
        $imagens = $produto->imagens()->attach(4);
        error_log("Imagem é: " . $imagem);


        //$produto->save();




        //$produto->imagens()->attach($produto->id);
        #$produt = Produto::findOrFail($produto->id);


        return redirect('/')->with('msg', 'Produto salvo com sucesso');
    }
}
