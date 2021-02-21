@extends('layouts.main')

@section('title', 'Cadastrar produtos')

@section('content')


<h1>Produtos</h1>


<div id="cards-container" class="row">
        @foreach($produtos as $produto)
        <a href="/produtos/{{ $produto->id }}">
            <div class="card col-md-4">
            @foreach($produto->imagens as $key => $value)
                <img src="/img/produtos/{{ $value['imagem'] }}" class="imagem-capa" alt="{{ $produto->nome }}">
            @endforeach
                <div class="card-body">
                    <h5 class="card-title">{{ $produto->nome }}</h5>
                    <p>R$ {{ $produto->valor_venda }}</p>
                </div>
                </a>
                
            </div>
        @endforeach

        @if(count($produtos) == 0 && $search ?? '' ?? '' )
            <p>Não foi possível encontrar nenhum produto com o termo {{ $search ?? '' ?? '' }} ! <a href="/">Ver todos</a></p>
        @elseif(count($produtos) == 0)
            <p>Não há produtos disponíveis</p>
        @endif

    </div>




@endsection
