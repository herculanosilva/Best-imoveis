@extends('layouts.app')

@section('conteudo-principal')
    <div class="row">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
                <br>
                    <div class="card">
                        <div class="card-content">
                            {{-- nome --}}
                            <div class="input-field col s12">
                                <input type="text" name="name" id="name" value="{{old('name', $user->name ?? '')}}" required />
                                <label for="name">Nome</label>
                                @error('name')
                                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <br>
                            {{-- email --}}
                            <div class="input-field col s12">
                                <input type="text" name="email" id="email" value="{{old('email', $user->email ?? '')}}" required />
                                <label for="email">E-mail</label>
                                @error('email')
                                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <br>
                            {{-- senha --}}
                            <div class="input-field col s12">
                                <input type="password" name="password" id="password" required/>
                                <label for="password">Senha</label>
                                @error('password')
                                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <br>
                            {{-- confirmar senha --}}
                            <div class="input-field col s12">
                                <input type="password" name="password_confirmation" id="password-confirm" required/>
                                <label for="password-confirm">Confirmar senha</label>
                                @error('password-confirm')
                                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <br>
                            {{-- Entrar --}}
                            <div class="form-field center">
                                <button class="btn-large waves-effect waves-dark" style="width:25%;">Registrar</button>
                            </div><br>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
