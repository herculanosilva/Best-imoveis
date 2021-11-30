@extends('errors.illustrated-layout')

@section('title', "Serviço indisponível")
@section('code', '503')
@section('message', "Desculpe, o serviço está indisponível no momento. Tente novamente mais tarde.")
@section('image')
    <img src="{{ asset('img/Error-503.svg') }}">
@endsection
