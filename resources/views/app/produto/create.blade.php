@extends('layouts.default', ['session' => $session])
@section('title', 'Adicionar Produto | Super Gestão v1.0')
@section('content')
    <h1 class="mb-3 h2">Produtos</h1>
    <div class="row mt-3 mb-3 justify-content-end">
        <div class="col-sm-3 btn-group" role="group" aria-label="Ações para Fornecedores">
            <a href="{{route('produto.create')}}" class="btn btn-outline-dark"> Novo </a>
            <a href="{{route('produto.index')}}" class="btn btn-outline-dark"> Consulta </a>
        </div>
    </div>
    <div class="row mt-3 justify-content-center">
        <div class="col-sm-6">
            <form action="{{ route('produto.store') }}" method="post">
                @csrf
                <div class="col-12 mb-3">
                    <h2 class="h3">Utilize os campos abaixo para adicionar um novo produto</h2>
                </div>
                <div class="col-12 mb-3">
                    <label for="inputName" >Nome</label>
                    <input type="text" name="nome" id="inputName"
                        class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" placeholder="Nome do produto"
                        value="{{ old('nome') }}">
                    @if ($errors->has('nome'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nome') }}
                        </div>
                    @endif
                </div>
                <div class="col-12 mb-3">
                    <label for="inputEmail" >Descrição</label>
                    <input type="text" name="descricao" id="inputEmail"
                        class="form-control {{ $errors->has('descricao') ? 'is-invalid' : '' }}" placeholder="Descrição do produto"
                        value="{{ old('descricao') }}">
                    @if ($errors->has('descricao'))
                        <div class="invalid-feedback">
                            {{ $errors->first('descricao') }}
                        </div>
                    @endif
                </div>
                <div class="col-12 mb-3">
                    <label for="inputTelefone" >Peso</label>
                    <input type="text" name="peso" id="inputTelefone"
                        class="form-control {{ $errors->has('peso') ? 'is-invalid' : '' }}" placeholder="Peso do produto"
                        value="{{ old('peso') }}">
                    @if ($errors->has('peso'))
                        <div class="invalid-feedback">
                            {{ $errors->first('peso') }}
                        </div>
                    @endif
                </div>
                <div class="col-12 mb-3">
                    <label for="selectUnidades">Unidade de Medida</label>
                    <select name="unidade_id" id="selectUnidades" class="form-select {{ $errors->has('unidade_id') ? 'is-invalid' : '' }}" >
                        <option value=""> --- Selecione a unidade de medida --- </option>
                        @foreach($unidades as $unidade)
                            <option {{ $unidade->id == old('unidade_id') ? 'selected' : ''}}  value="{{ $unidade->id }}">{{ $unidade->descricao }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('unidade_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('unidade_id') }}
                        </div>
                    @endif
                </div>
                <div class="col-12 mb-3 d-grid">
                    <button type="submit" class="btn btn-outline-primary"> <i class="bi bi-send"></i> Adicionar produto</button>
                  </div>
            </form>
        </div>
    </div>
@endsection
