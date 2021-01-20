<html>

<h1>Produtos</h1>

    @foreach($produtos as $produto)
        <p>{{ $produto->nome }}</p>
        <p>{{ $produto->descricao }}</p>
        <p>{{ $produto->valor_venda }}</p>
        @foreach($produto->imagens as imagens)
            <p>{{ $produto->imagens }}</p>
        @endforeach
       
    @endforeach

</html>