<html>


<div>

    <form action="/produtos" method="POST"  enctype="multipart/form-data">
    @csrf 
        Codigo: <input type="text" id="codigo" name="codigo"> <br>
        Nome:<input type="text"id="nome" name="nome"><br>
        Descrição: <input type="text" id="descricao" name="descricao"><br>
        Valor Compra: <input type="number" id="valor_compra" name="valor_compra"><br>
        Valor Venda: <input type="number" id="valor_venda" name="valor_venda"> <br>
        Ativo: <input type="checkbox" id="ativo" name="ativo"><br>
        
        <input type="file" name="imagem" id="imagem"> <br> <br>

        <input type="submit" value="Salvar Produto">
    
    </form>

</div>

</html>