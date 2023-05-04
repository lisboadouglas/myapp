<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\MotivoContato;

class PrincipalController extends Controller
{
    /**
     * Este método tem por objetivo trazer a view raiz
    */
    public function index(){
        $motivo_contato = MotivoContato::all();
        return view('site.principal', ['motivo' => $motivo_contato]);
    }
}
