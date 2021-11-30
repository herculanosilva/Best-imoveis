@extends('errors.illustrated-layout')

@section('title', "Solicitação inválida")
@section('code', '400')
@section('message', "A solicitação não pôde ser entendida pelo servidor devido a uma sintaxe incorreta. Verifique a sintaxe e modifique o necessário.")
@section('image')
    <img src="{{ asset('img/Error-400.svg') }}">
@endsection
