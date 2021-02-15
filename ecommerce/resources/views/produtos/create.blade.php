@extends('layouts.main')

@section('title', 'Cadastrar produtos')

@section('content')

    <form action="/produtos" method="POST"  enctype="multipart/form-data">
    @csrf
        <span>Codigo: <input class="inp" type="text" id="codigo" name="codigo"></span>
        <span>Nome:<input  class="inp" type="text"id="nome" name="nome"></span>
        <span>Descrição: <input  class="inp" type="text" id="descricao" name="descricao"></span>
        <span>Valor Compra: <input  class="inp" type="number" id="valor_compra" name="valor_compra"></span>
        <span>Valor Venda: <input  class="inp" type="number" id="valor_venda" name="valor_venda"></span>
        <span>Ativo: <input type="checkbox" id="ativo" name="ativo"></span>

        <span>
            Categoria: <select name="categoria" id="categoria">
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
            @endforeach
            </select>
        </span>
        <span class="ficha">Ficha Técnica: <div id="informacoes"></div>
        <a href="#" id="btnAdd">Adicionar informações ao produto</a>
        </span>
        <input type="file" name="imagem" id="imagem">
        <input class="salvar" type="submit" value="Salvar Produto">
    </form>

    <script type="text/javascript">

        var cont = 1;
        $("#btnAdd").click(function(){
            $("#informacaoes").prepend("<div id='informacaoes" + cont + "'>Informações: <input type='text' name='informacoes[]' class='info' id='info'> <a href='#' id='" + cont + "' class='btn-remove'>-</a></div> <br>");
            cont++;
        });

        $("form").on('click', '.btn-remove', function() {
           var btn_id =  $(this).attr("id");
           $("#informacaoes" + btn_id + "").remove();
        });
    </script>

@endsection
