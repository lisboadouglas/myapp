@extends('layouts.default')
@section('title', 'User Page')
@section('content')
    

@foreach ($users as $user)
    {{ $user->name }}<br>    
@endforeach
@endsection