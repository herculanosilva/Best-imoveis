@extends('errors.illustrated-layout')

@section('title', "Muitas solicitações")
@section('code', '429')
@section('message', "Desculpe, você atingiu o limite de requesições, tente novamente mais tarde.")
@section('image')
    <img src="{{ asset('img/Error-429.svg') }}">
@endsection
