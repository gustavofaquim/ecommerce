@extends('layouts.main')

@section('title', 'Cadastrar produtos')

@section('content')


<h1>Produtos</h1>


<div id="cards-container" class="row">
        @foreach($produtos as $produto)
        <a href="/events/{{ $produto->id }}">
            <div class="card col-md-4">
            @foreach($produto->imagens as $key => $value)
                <img src="/img/produtos/{{ $value['imagem'] }}" alt="{{ $produto->nome }}"> 
            @endforeach
                <div class="card-body">
                    <h5 class="card-title">{{ $produto->nome }}</h5>
                    <p>R$ {{ $produto->valor_venda }}</p>
                   
                </div>
                </a>
            </div>
        @endforeach

        @if(count($produtos) == 0 && $search )
            <p>Não foi possível encontrar nenhum evento com o termo {{ $search }} ! <a href="/">Ver todos</a></p>
        @elseif(count($produtos) == 0)
            <p>Não há eventos disponíveis</p>
        @endif

    </div>




@endsection