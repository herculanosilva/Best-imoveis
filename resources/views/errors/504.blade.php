@extends('errors.illustrated-layout')

@section('title', "Está página não está funcionando")
@section('code', '504')
@section('message', "Desculpe, está página está indisponível no momento. Tente novamente mais tarde.")
@section('image')
    <img src="{{ asset('img/Error-504.svg') }}">
@endsection
