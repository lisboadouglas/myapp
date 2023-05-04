<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function index(){
        return view('app.fornecedor.index',['session' => $_SESSION]);
    }
    public function list(Request $request){
        return view('app.fornecedor.list',['session' => $_SESSION]);
    }
    public function new(Request $request){
        return view('app.fornecedor.new',['session' => $_SESSION]);
    }
}
