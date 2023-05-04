<?php

namespace App\Http\Controllers;

use App\Http\Middleware\LogAccessMiddleware;
use Illuminate\Http\Request;

class SobreController extends Controller
{
   
    public function index(){
        return view("site.sobre");
    }
}
