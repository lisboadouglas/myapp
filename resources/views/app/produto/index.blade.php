@extends('layouts.default', ['session' => $session])
@section('title', 'Produtos | Super Gestão v1.0')
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
    <div class="row mt-3">
        <div class="col-sm-12 table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descricao</th>
                        <th>Peso</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{$produto->nome }}</td>
                            <td>{{$produto->descricao }}</td>
                            <td>{{$produto->peso }}</td>
                            <td>
                                <a href=" {{route('produto.show', $produto->id)}} " class="btn btn-sm btn-outline-dark"> <i class="bi bi-eye-fill"></i> </a>
                                <a href=" {{route('produto.edit', $produto->id)}} " class="btn btn-sm btn-outline-info"> <i class="bi bi-pencil-square"></i> </a>
                                <form action="{{route('produto.destroy',['produto' =>$produto->id])}}" method="post"> @csrf @method('DELETE') <button type="submit" class="btn btn-sm btn-outline-danger"> <i class="bi bi-trash-fill"></i> </button> </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-3 justify-content-center">
        <div class="col-sm">
            {{ $produtos->appends($request)->links() }}
        </div>
    </div>
@endsection
