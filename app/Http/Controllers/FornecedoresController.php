<?php

namespace App\Http\Controllers;

use App\Models\Fornecedores;
use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function index(){
        return view('app.fornecedor.index',['session' => $_SESSION]);
    }
    public function list(Request $request){
        $fornecedores = Fornecedores::where('name', 'like', '%'.$request->input('name').'%')
                                    ->where('address','like','%'.$request->input('email').'%')
                                    ->where('phone','like','%'.$request->input('phone').'%')
                                    ->paginate(20);
        return view('app.fornecedor.list',['session' => $_SESSION,'fornecedores' => $fornecedores, 'request' => $request->all()]);
    }
    public function new(Request $request){
        if($request->input('_token') != "" && $request->input('id') == ""):
            $rules = [
                'name' => 'min:3|max:50',
                'address' => 'min:3|max:254',
                'email' => 'email:rfc,dns',
                'phone' => 'min:3|max:20'
            ];
            $feedback = [
                'min' => 'O campo :attribute deverá conter mais de 3 caracteres.',
                'name.max' => 'O campo de nome não poderá conter mais de 50 caracteres.',
                'address.max' => 'O campo de endereço não poderá conter mais de 254 caracteres.',
                'phone.max' => 'O campo de telefone não poderá conter mais de 20 caracteres.',
                'email' => 'O e-mail informado não é válido. Por favor, informe um e-mail válido'
            ];
            $request->validate($rules,$feedback);
            Fornecedores::create($request->all());
            return redirect()->route('app.fornecedores.listar');
        elseif($request->input('_token') != "" & $request->input('id') != ''):
            $fornecedor = Fornecedores::find($request->input('id'));
            $update = $fornecedor->update($request->all());
            if($update):
                return redirect()->route('app.fornecedores.listar');
            else:
                return redirect()->route('app.fornecedores.editar', $request->input('id'));
            endif;
        endif;
        return view('app.fornecedor.new',['session' => $_SESSION]);
    }
    public function edit($id){
        $fornecedor = Fornecedores::find($id);
        return view('app.fornecedor.new',['session' => $_SESSION,'fornecedor' => $fornecedor]);
    }
    public function delete($id){
        Fornecedores::find($id)->delete();
        return redirect()->route('app.fornecedores.listar');
    }
}
