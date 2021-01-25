@extends('layouts.main')

@section('title', 'Cadastrar produtos')

@section('content')

    <form action="/produtos" method="POST"  enctype="multipart/form-data">
    @csrf 
        Codigo: <input type="text" id="codigo" name="codigo"> <br>
        Nome:<input type="text"id="nome" name="nome"><br>
        Descrição: <input type="text" id="descricao" name="descricao"><br>
        Valor Compra: <input type="number" id="valor_compra" name="valor_compra"><br>
        Valor Venda: <input type="number" id="valor_venda" name="valor_venda"> <br>
        Ativo: <input type="checkbox" id="ativo" name="ativo"><br>
        
        Categoria: <select name="categoria" id="categoria">
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
            @endforeach 
        </select>
        <br>
        Ficha Técnica: <br>
        <div id="informacaoes"></div>
        <a href="#" id="btnAdd">Adicionar informações ao produto</a>
        

        <input type="file" name="imagem" id="imagem"> <br><br>

        <input type="submit" value="Salvar Produto">
        
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