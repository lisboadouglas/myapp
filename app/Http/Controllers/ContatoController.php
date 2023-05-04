<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Contatos;
use \App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function index(){
        $motivo_contato = MotivoContato::all();
        return view("site.contato", ['motivo' => $motivo_contato]);
    }
    public function formSend(Request $request){
        $rules = [
            'nome' => 'min:3|max:50',
            'telefone' => 'min:3|max:15',
            'email' => 'email:rfc,dns',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'min:3|max:2000'
        ];
        $feedbacks = [
            'min' => 'O campo :attribute deverá conter mais de 3 caracteres. Por favor, revise o campo.',
            'max' => 'O campo :attribute contém mais de 50 caracteres. Por favor, revise o campo.',
            'email' => 'O e-mail informado é inválido. Por favor, preencha o campo com um e-mail válido.',
            'motivo_contatos_id' => 'O campo motivo de contato é um campo obrigatório. Por favor, selecione um motivo de contato',
            'mensagem' => 'A mensagem deverá conter entre 3 e 2000 caracteres',
            'required' => 'O campo :attribute é obrigatório. Por favor, preencha-o corretamente'
        ];
        $request->validate($rules,$feedbacks);
        Contatos::create($request->all());
        return redirect()->route('base');
    }
}
