@extends('layouts.main')

@section('title', 'Cadastrar produtos')

@section('content')
    
    <form action="/produtos" method="POST"  enctype="multipart/form-data">
    @csrf
    @if(isset($produto))
        @method('PUT')
    @endif
        <span>Codigo: <input class="inp" type="text" id="codigo" name="codigo" @if(isset($produto)) value="{{$produto->codigo}}"@endif></span>
        <span>Nome:<input  class="inp" type="text"id="nome" name="nome" @if(isset($produto)) value="{{$produto->nome}}"@endif></span>
        <span>Descrição: <input  class="inp" type="text" id="descricao" name="descricao" @if(isset($produto)) value="{{$produto->descricao}}"@endif></span>
        <span>Valor Compra: <input  class="inp" type="number" id="valor_compra" name="valor_compra" @if(isset($produto)) value="{{$produto->valor_compra}}"@endif></span>
        <span>Valor Venda: <input  class="inp" type="number" id="valor_venda" name="valor_venda" @if(isset($produto)) value="{{$produto->valor_venda}}"@endif></span>
        <span>Ativo: <input type="checkbox" id="ativo" name="ativo" 
            @if(isset($produto)) 
                @if($produto->ativo == True)
                    checked="checked"
                @endif
            @endif></span>

        <span>
            Categoria: <select name="categoria" id="categoria">
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
            @endforeach
            </select>
        </span>


        @if(isset($produto))
            <span>
           
                @if($produto->informacoes != "")
                        <p>Informações</p>
                        @foreach($produto->informacoes as $informacao)
                            <input type='text' name='informacoes[]' class='info' id='info' value="{{ $informacao }}">
                        @endforeach
                    @endif   
            </span>
        
        @endif

        <span class="ficha">Ficha Técnica: <div id="informacoes"></div>
            <a href="#" id="btnAdd">Adicionar informações ao produto</a>
        </span>
        
        
        @if(isset($produto))
        <span>
            @foreach($produto->imagens as $key => $value)
                <img src="/img/produtos/{{ $value['imagem'] }}" class="imagem-capa" alt="{{ $produto->nome }}">
            @endforeach
        </span>
        @endif
        
        
        <input type="file" name="imagem" id="imagem">
        <input class="salvar" type="submit" value="Salvar Produto">
    </form>

    <script type="text/javascript">

        verificaVariavel(1);

        var cont = 1;
        $("#btnAdd").click(function(){
            $("#informacoes").prepend("<div id='informacoes" + cont + "'>Informações: <input type='text' name='informacoes[]' class='info' id='info'> <a href='#' id='" + cont + "' class='btn-remove'>-</a></div> <br>");
            cont++;
        });

        $("form").on('click', '.btn-remove', function() {
           var btn_id =  $(this).attr("id");
           $("#informacaoes" + btn_id + "").remove();
        });
    </script>

@endsection
