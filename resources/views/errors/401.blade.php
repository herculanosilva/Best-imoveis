@extends('errors.illustrated-layout')

@section('title', "Acesso não autorizado")
@section('code', '401')
@section('message', "Desculpe, você não tem autorização para acessar está página.")
@section('image')
    <img src="{{ asset('img/Error-401.svg') }}">
@endsection
