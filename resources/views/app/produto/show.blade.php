@extends('layouts.default', ['session' => $session])
@section('title','Detalhes do Produto | Super Gestão v1.0')
@section('content')
    <h1 class="mb-3 h2">Produtos</h1>
    <div class="row mt-3 mb-3 justify-content-end">
        <div class="col-sm-3 btn-group" role="group" aria-label="Ações para Produtos">
            <a href="{{ route('produto.create') }}" class="btn btn-outline-dark"> Novo </a>
            <a href=" {{ route('produto.index') }} " class="btn btn-outline-dark"> Consulta </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm">
            
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th colspan="2" class="">
                            <div class="d-flex justify-content-between">
                                <div><h3>Detalhes do Produto</h3></div>
                                <div> <a href="{{route('produto.edit', $produto->id)}}" class="btn btn-sm btn-dark"> <i class="bi bi-pencil-fill"></i> Editar</a> </div>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td>ID</td>
                        <td>{{ $produto->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>{{ $produto->nome }}</td>
                    </tr>
                    <tr>
                        <td>Descrição</td>
                        <td> {{ $produto->descricao }} </td>
                    </tr>
                    <tr>
                        <td>Peso</td>
                        <td> {{ $produto->peso }} </td>
                    </tr>
                    <tr>
                        <td>Unidade </td>
                        <td>{{$produto->unidade_id}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection