@extends('layouts.main')

@section('title', $produto->nome)

@section('content')

<div>
    <h1>{{ $produto->nome }}</h1>

    <h2>R$ {{ $produto->valor_venda }}</h2>

    @foreach($produto->imagens as $key => $value)
        <img src="/img/produtos/{{ $value['imagem'] }}" class="imagem-capa" alt="{{ $produto->nome }}">
    @endforeach

    <p> {{ $produto->descricao }} </p>

    
    @if($produto->informacoes != "")
        <ul>
            @foreach($produto->informacoes as $informacao)
                <li>{{ $informacao }}</li>
            @endforeach
        </ul>
    @endif
    
    <p>{{ $produto->categoria->nome }}</p>

    <form action="">
        <input type="text" id='frete' name='frete'>
        <input type="submit" value="Calular Frete">
    </form>

    <button>Comprar</button>

</div>

@endsection