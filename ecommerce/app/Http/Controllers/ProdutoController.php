<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Imagem;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    public function index(){

        $produtos = Produto::all();

        return view('index', ['produtos' => $produtos]);

    }

    public function create(){

        $categorias = Categoria::all();

        return view('produtos.create', ['categorias' => $categorias]);
    }

    public function store(Request $request){
        $produto = new Produto();
        $produto->codigo = $request->codigo;
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->valor_venda = $request->valor_venda;
        $produto->valor_compra = $request->valor_compra;
        $produto->categoria_id = $request->categoria;

        error_log("ID Categoria: " . $request->categoria);
        
        if($request->ativo){
            $produto->ativo = True;
        }
        else{
            $produto->ativo = False;
        }

        $produto->save();

        //imagem
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImagem = $request->imagem;

            $extensao = $requestImagem->extension();

            $nomeImagem = md5($requestImagem->getClientOriginalName() . strtotime('now')) . "." . $extensao;

            $requestImagem->move(public_path('img/produtos'), $nomeImagem);


            //$produto = Produto::find($produto->id);
            
            $imagem = new Imagem();

            error_log("ID produto:". $produto);

            $imagem->imagem = $nomeImagem;

            $produto->imagens()->save($imagem);

        }

        return redirect('/')->with('msg', 'Produto salvo com sucesso');
    }

    public function addImagens($id){
        
        $produto = Produto::find($id);

        error_log("Produto é: " . $produto);

        $imagem = new Imagem();

        $imagem->imagem = "uma imagem das mais legais vai entrar aqui ô";

        $produto->imagens()->save($imagem);

        return "imagem salva com sucesso, parabens";
    }
}
