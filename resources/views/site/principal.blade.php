@extends('layouts.default')
@section('title', 'Super Gestão v1.0')
@section('content')
    <div class="row">
        <div class="col-sm">
            <h1>Sistema Super Gestão</h1>
            <p>Software para gestão empresarial ideal para sua empresa.</p>
            <div class="chamada mb-3">
                <img src="{{ asset('img/check.png') }}">
                <span class="texto-branco">Gestão completa e descomplicada</span>
            </div>
            <div class="chamada mb-3">
                <img src="{{ asset('img/check.png') }}">
                <span class="texto-branco">Sua empresa na nuvem</span>
            </div>
            <div class="video">
                <img src="{{ asset('img/player_video.jpg') }}">
            </div>
        </div>
        <div class="col-sm">
            <h1>Contato</h1>
            <p>Caso tenha qualquer dúvida por favor entre em contato com nossa equipe pelo formulário abaixo.</p>
            @component('layouts._components.form_contato', ['motivos' => $motivo])
            @endcomponent
        </div>
    </div>
@endsection