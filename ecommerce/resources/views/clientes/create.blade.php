@extends('layouts.main')

@section('title', 'Cadastrar clientes')

@section('content')
    
    <form action="/clientes" method="POST"  enctype="multipart/form-data">
        <fieldset> 
            <legend>Dados pessoais</legend>
            <span>Nome:<input type="text" id='nome' name='nome'></span>
            <span>Nascimento:<input type="text"  id='nascimento' name='nascimento'></span>
            <span>E-mail:<input type="text"  id='email' name='email'></span>
            <span>Endereço:<input type="text"  id='endereco' name='endereco'></span>
            <span>CPF:<input type="text"  id='cpf' name='cpf'></span>
            <span>RG:<input type="text"  id='rg' name='rg'></span>
            <span>RG:<input type="text"  id='rg' name='rg'></span>
        </fieldset>

        <fieldset>
        <legend>Endereço</legend>
            <span>Lagradouro:<input type="text" id='lagradouro' name='lagradouro'></span>
            <span>Complemento:<input type="text" id='complemento' name='complemento'></span>
            <span>Numero:<input type="text" id='numero' name='numero'></span>
            <span>Ponto de referência:<input type="text" id='referencia' name='referencia'></span>
            <span>CEP:<input type="text" id='cep' name='cep'></span>
            <span>Cidade:<input type="text" id='cidade' name='cidade'></span>
        </fieldset>
    
    
    </form>
@endsection
