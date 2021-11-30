@extends('errors.illustrated-layout')

@section('title', "Tempo limite expirado")
@section('code', '419')
@section('message', "Desculpe, sua sessão expirou. Atualize a página para continuar.")
@section('image')
    <img src="{{ asset('img/Error-419.svg') }}">
@endsection
