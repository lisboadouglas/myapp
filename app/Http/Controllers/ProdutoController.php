<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(20);
        return view('app.produto.index', ['session' => $_SESSION,'produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto.create', ['session' => $_SESSION, 'unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nome' => 'min:3|max:250',
            'unidade_id' => 'exists:unidades,id',
            'descricao' => 'min:3',
            'peso' => 'required'
        ];
        $feedbacks = [
            'min' => 'O campo :attribute deverá conter mais de 3 caracteres',
            'max' => 'O campo :attribute deverá conter menos de 250 caracteres',
            'required' => 'O campo :attribute é de preenchimento obrigatório',
            'exists' => 'A unidade de medida informada no campo :attribute não existe'
        ];
        $request->validate($rules,$feedbacks);
        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto, 'session' => $_SESSION]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'session' => $_SESSION]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $rules = [
            'nome' => 'min:3|max:250',
            'unidade_id' => 'exists:unidades,id',
            'descricao' => 'min:3',
            'peso' => 'required'
        ];
        $feedbacks = [
            'min' => 'O campo :attribute deverá conter mais de 3 caracteres',
            'max' => 'O campo :attribute deverá conter menos de 250 caracteres',
            'required' => 'O campo :attribute é de preenchimento obrigatório',
            'exists' => 'A unidade de medida informada no campo :attribute não existe'
        ];
        $request->validate($rules,$feedbacks);
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
