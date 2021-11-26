@extends('errors.illustrated-layout')

@section('title',"Acesso proibido")
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Desculpe, você não tem permissão para acessar está página'))
@section('image')
    <img src="{{ asset('img/Error-403.svg') }}">
@endsection
