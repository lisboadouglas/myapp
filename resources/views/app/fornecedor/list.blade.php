@extends('layouts.default', ['session' => $session])
@section('title', 'Fornecedores | Super Gestão v1.0')
@section('content')
    <h1 class="mb-3 h2">Fornecedores</h1>
    <div class="row mt-3 mb-3 justify-content-end">
        <div class="col-sm-3 btn-group" role="group" aria-label="Ações para Fornecedores">
            <a href="{{route('app.fornecedores.novo')}}" class="btn btn-outline-dark"> Novo </a>
            <a href="{{route('app.fornecedores.listar')}}" class="btn btn-outline-dark"> Consulta </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm">
            <form action="{{ route('app.fornecedores.listar') }}" class="row row-cols-lg-auto g-3 align-items-center justify-content-center" method="post">
                @csrf
                <div class="col-12">
                    <label for="inputName" class="visually-hidden">Nome</label>
                    <input type="text" name="name" id="inputName"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Nome do Fornecedor"
                        value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="col-12">
                    <label for="inputEmail" class="visually-hidden">Email</label>
                    <input type="email" name="email" id="inputEmail"
                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email do Fornecedor"
                        value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <div class="col-12">
                    <label for="inputTelefone" class="visually-hidden">Telefone</label>
                    <input type="tel" name="phone" id="inputTelefone"
                        class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="Telefone do Fornecedor"
                        value="{{ old('phone') }}">
                    @if ($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-outline-primary"> <i class="bi bi-search"></i> Buscar</button>
                  </div>
            </form>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm-12 table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fornecedores as $fornecedor)
                        <tr>
                            <td>{{$fornecedor->name }}</td>
                            <td>{{$fornecedor->email }}</td>
                            <td>{{$fornecedor->phone }}</td>
                            <td>{{$fornecedor->address }}</td>
                            <td>
                                <a href="{{route('app.fornecedores.editar', $fornecedor->id)}}" class="btn btn-xs btn-outline-info"> <i class="bi bi-pencil-square"></i> </a>
                                <a href="{{ route('app.fornecedores.excluir', $fornecedor->id) }}" class="btn btn-xs btn-outline-danger"> <i class="bi bi-trash-fill"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-3 justify-content-center">
        <div class="col-sm">
            {{ $fornecedores->appends($request)->links() }}
        </div>
    </div>
@endsection
