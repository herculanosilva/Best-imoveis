@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <br>
            <div class="col s8">
                <div class="card">
                    <div class="card-content">
                        {{-- email --}}
                        <div class="input-field col s12">
                            <input type="text" name="email" id="email" value="{{old('email', $user->email ?? '')}}" required />
                            <label for="email">E-mail</label>
                            @error('email')
                                <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        {{-- senha --}}
                        <div class="input-field col s12">
                            <input type="password" name="password" id="password" required/>
                            <label for="password">Senha</label>
                            @error('password')
                                <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        {{-- manter conectado --}}
                        <div class="form-field red-text text-darken-2">
                            <label>
                                <input type="checkbox" />
                                <span>Manter conectado</span>
                            </label>
                        </div>
                        <br>
                            <a class="black-text text-darken-4" href="{{ route('password.update') }}">Esqueceu a senha?</a>
                        <div class="right">
                            <span>Não tem conta?</span><a class="black-text text-darken-4" href="{{ route('register') }}"> Criar uma conta</a>
                        </div>
                        <br>
                        <br>
                        <br>
                        {{-- Entrar --}}
                        <div class="form-field center">
                            <button class="btn waves-effect waves-red" style="width:25%;">Entrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
