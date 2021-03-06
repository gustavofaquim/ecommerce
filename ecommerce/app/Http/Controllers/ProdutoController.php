<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Imagem;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    public function index(){

        $search = request('search');

        if($search){
            $produtos = Produto::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        }
        else{
            //$produtos = Produto::all();
            //Exibindo somente os produtos ativos
            $produtos = Produto::where([
                ['ativo', '=', True]
            ])->get();
        }


        return view('index', ['produtos' => $produtos,'search'=>$search]);

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
        if($request->informacoes != null) {
            $produto->informacoes = $request->informacoes;
            error_log("Informações: " . $request->informacoes[0]);
        }else{
            $produto->informacoes = "";
        }
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


            $imagem->imagem = $nomeImagem;

            $produto->imagens()->save($imagem);

        }

        return redirect('/')->with('msg', 'Produto salvo com sucesso');
    }


    public function show($id){
        $produto = Produto::findOrFail($id);
        
        
        return view('produtos.show', ['produto'=>$produto]);
    }

    public function edit($id){
        $produto = Produto::findOrFail($id);

        $categorias = Categoria::all();

        return view('produtos.create', ['produto' => $produto, 'categorias'=>$categorias]);
    }

    public function update(Request $request){
        //Produto::findOrFail($request->id)->update($request->all());

        $produto = Produto::findOrFail($request->id);
        $produto->codigo = $request->codigo;
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->valor_venda = $request->valor_venda;
        $produto->valor_compra = $request->valor_compra;
        $produto->categoria_id = $request->categoria;

        if($request->informacoes != null) {
            $informacoes = array_filter($request->informacoes);
            $produto->informacoes = $informacoes;
            //error_log("Informações: " . $request->informacoes[0]);
        }else{
            $produto->informacoes = "";
        }
        if($request->ativo){
            $produto->ativo = True;
        }
        else{
            $produto->ativo = False;
        }

        $produto->update();

        return redirect('/')->with('msg', 'Produto atualizado com sucesso');  
    }

    public function list(){
        $search = request('search');

        if($search){
            $produtos = Produto::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        }
        else{
            //Exibindo todos os produtos
            $produtos = Produto::all();
            
        }
        return view('produtos.list', ['produtos' => $produtos,'search'=>$search]);
        
        
    }


}
