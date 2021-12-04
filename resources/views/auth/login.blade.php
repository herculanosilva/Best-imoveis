@extends('layouts.app')

@section('conteudo-principal')
    <div class="row">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row">
                <br>
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
                            {{-- manter conectado --}}
                            <div class="form-field red-text text-darken-2">
                                <label>
                                    <input type="checkbox" />
                                    <span>Manter conectado</span>
                                </label>
                            </div>
                            <br>
                            {{-- Entrar --}}
                            <div class="form-field center">
                                <button class="btn-large waves-effect waves-dark" style="width:25%;">Entrar</button>
                            </div><br>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
