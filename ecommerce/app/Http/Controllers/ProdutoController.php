<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(){

        $teste = ['Maria', 'João', 'Ricardo'];

        return view('index', ['teste' => $teste]);

    }
}
