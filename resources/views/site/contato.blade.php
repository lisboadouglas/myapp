@extends('layouts.default')
@section('title', 'Contato | Super Gestão v1.0')
@section('content')
    <div class="row">

        <div class="col-sm">
            <h1>Contato</h1>
            <p>Caso tenha qualquer dúvida por favor entre em contato com nossa equipe pelo formulário abaixo.</p>
            @component('layouts._components.form_contato', ['motivos' => $motivo] )
            @endcomponent
        </div>
    </div>
@endsection