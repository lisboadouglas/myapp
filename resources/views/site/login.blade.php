@extends('layouts.default')
@section('title', 'Acesso Restrito | Super Gestão v1.0')
@section('content')
    <div class="row">
        <div class="col-sm-4 form-signin m-auto">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <img src="{{ asset('img/logo.png') }}" alt="Super Gestão" class="d-block mx-auto mb-3">
                <h1 class="h3 mb-3 fw-normal text-center">Por favor, realize o login!</h1>
                @if(isset($error) && $error === 'true')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>OPS!</strong> O e-mail e/ou senha estão incorretos. Por favor, tente novamente.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(isset($error) && $error === 'expired')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>OPS!</strong> O tempo de sessão expirou. Por favor, realize o login novamente.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="form-floating">
                    <label for="#inputEmail">E-mail de acesso</label>
                    <input type="text" value="{{ old('email') }}" name="email" id="inputEmail"  placeholder="Email de acesso" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} " >
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <div class="form-floating mb-3">
                    <label for="#inputPass">Senha de acesso</label>
                    <input type="password" name="pass" id="inputPass" class="form-control {{ $errors->has('pass') ? 'is-invalid' : ''}} " placeholder="Senha de acesso" >
                    @if ($errors->has('pass'))
                        <div class="invalid-feedback">
                            {{ $errors->first('pass') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="w-100 btn btn-lg btn-outline-dark"> Acessar </button>
            </form>
        </div>
    </div>
@endsection