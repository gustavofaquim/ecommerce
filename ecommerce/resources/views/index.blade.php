<html>

<h1>Produtos</h1>

    @foreach($produtos as $produto)
        <h2>{{ $produto->nome }}</h2>
        <p>{{ $produto->descricao }}</p>
        <p>{{ $produto->valor_venda }}</p>
       
       @foreach($produto->imagens as $key => $value)
        <img src="/img/produtos/{{ $value['imagem'] }}" alt="{{ $produto->nome }}"> 
       @endforeach
      
        
       
    @endforeach

</html>