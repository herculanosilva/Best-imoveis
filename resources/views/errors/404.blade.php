@extends('errors.illustrated-layout')

@section('title', "Página não encontrada")
@section('code', '404')
@section('message', "Desculpe, a página que você está procurando não foi encontrada.")
@section('image')
    <img src="{{ asset('img/Error-404.svg') }}">
@endsection
