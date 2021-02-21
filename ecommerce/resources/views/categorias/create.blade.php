@extends('layouts.adm')

@section('title', 'Cadastrar produtos')

@section('content')

    <form action="/categorias" method="POST">
    @csrf 
        Nome: <input type="text" name="nome" id="nome"> <br>
        Descricao: <textarea name="descricao" id="descricao"></textarea> <br>

        <input type="submit" value="Salvar Categoria">
    
    </form>

@endsection