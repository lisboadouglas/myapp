<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    /**
     * Este método tem por objetivo trazer a view raiz
    */
    public function index(){
        return view('site.principal');
    }
}
