<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Obrigado extends Controller
{
    public function index(){
        return view('site.obrigado');
    }
}
