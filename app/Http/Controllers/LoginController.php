<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request){
        $error = $request->get('error');
        return view('site.login', ['error' => $error]);
    }
    public function authenticate(Request $request){
        $rules = [
            'email' => 'email:rfc,dns',
            'pass' => 'required',
        ];
        $feedbacks = [
            'email' => 'O e-mail informado é inválido. Por favor, preencha o campo com um e-mail válido.',
            'pass' => 'O campo senha é obrigatório. Por favor, preencha-o corretamente'
        ];
        $request->validate($rules,$feedbacks);
        $email = $request->get('email');
        $pass = $request->get('pass');
        
        $users = new User();

        $exists = $users->where('email', $email)->where('password', $pass)->get()->first();
        if(isset($exists->name)):
            session_start();
            $_SESSION['id'] = $exists->id;
            $_SESSION['nome'] = $exists->name;
            $_SESSION['email'] = $exists->email;

            return redirect()->route('app.home');
        else:
            return redirect()->route('login', ['error'=> 'true']);
        endif;

    }
    public function logout(){
        session_destroy();
        return redirect()->route('login');
    }
}
