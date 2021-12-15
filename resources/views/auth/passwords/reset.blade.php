@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="row">
        <br>
        <div class="card">
            <div class="card-content">
                {{-- email --}}
                <div class="input-field col s12">
                    {{-- <input type="text" name="email" id="email" value="{{old('email', $user->email ?? '')}}" required /> --}}
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email">
                    <label for="email">E-mail</label>
                    @error('email')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
                <br>
                {{-- senha --}}
                <div class="input-field col s12">
                    <input type="password" name="password" id="password" required autofocus/>
                    <label for="password">Senha</label>
                    @error('password')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
                <br>
                {{-- confirmar senha --}}
                <div class="input-field col s12">
                    <input type="password" name="password_confirmation" id="password-confirm" required autocomplete="new-password"/>
                    <label for="password-confirm">Confirmar senha</label>
                    @error('password-confirm')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
                <br>
                {{-- Modificar senha --}}
                <div class="form-field center">
                    <button class="btn waves-effect waves-dark" style="width:25%;">Modificar senha</button>
                </div>
                <br>
            </div>
        </div>
    </div>
</form>
@endsection
