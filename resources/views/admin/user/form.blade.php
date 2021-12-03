@extends('admin.layouts.principal')
@section('conteudo-principal')
    <section class="section">
        <form action="{{ $action }}" method="POST">
            @csrf
            {{-- verificando se estamos editando --}}
            @isset($users)
                @method('PUT')
            @endisset
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="name" id="name" value="{{old('name', $user->name ?? '')}}" required autofocus />
                    <label for="name">Nome</label>
                    @error('name')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="email" id="email" value="{{old('email', $user->email ?? '')}}" required autofocus />
                    <label for="email">E-mail</label>
                    @error('email')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="password" name="password" id="password" required autofocus />
                    <label for="password">Senha</label>
                    @error('password')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>
            <div class="right-align">
                <a href={{route('admin.user.index') }} class="btn-flat waves-effect"> Cancelar</a>
                <button class="btn waves-effect waves-light" user="submit">Salvar</button>
            </div>
        </form>
    </section>
@endsection
