@extends('errors.illustrated-layout')

@section('title', "Error no servidor")
@section('code', '500')
@section('message', "Desculpe, ocorreu um erro interno. Fique tranquilo, estamos cientes e trabalhando na correção.")
@section('image')
    <img src="{{ asset('img/Error-500.svg') }}">
@endsection
