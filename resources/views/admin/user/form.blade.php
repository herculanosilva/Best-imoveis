@extends('admin.layouts.principal')
@section('conteudo-principal')
    <section class="section">
        <form action="{{ $action }}" method="POST">
            @csrf
            {{-- verificando se estamos editando --}}
            @isset($user)
                @method('PUT')
            @endisset
            {{-- nome --}}
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="name" id="name" value="{{old('name', $user->name ?? '')}}" required autofocus />
                    <label for="name">Nome</label>
                    @error('name')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>
            {{-- email --}}
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="email" id="email" value="{{old('email', $user->email ?? '')}}" required autofocus />
                    <label for="email">E-mail</label>
                    @error('email')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>
            {{-- tipo de usuarios --}}
            <div class="row">
                <div class="input-field col s12">
                    <select name="type" required>
                        <option value="" disabled selected hidden>Selecione o tipo do usuário</option>
                        <option value="Administrador" {{ old('type', $user->type  ?? '') == "Administrador" ? 'selected' : ''}}>Administrador</option>
                        <option value="Usuario" {{ old('type', $user->type  ?? '') == "Usuario" ? 'selected' : ''}}>Usuário</option>
                    </select>
                    <label for="type">Tipo de usuário</label>
                    @error('type')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>
            {{-- senha --}}
            @if (!(isset($user)))
                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" name="password" id="password" required autofocus />
                        <label for="password">Senha</label>
                        @error('password')
                            <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                </div>
            @endif
            {{-- botões de ações --}}
            <div class="right-align">
                <a href={{route('admin.user.index') }} class="btn-flat waves-effect"> Cancelar</a>
                <button class="btn waves-effect waves-light" user="submit">Salvar</button>
            </div>
        </form>
    </section>
@endsection



{{--
<div class="row">
    <div class="input-field col s12">
        <select name="type" id="type">
            <option value="" disabled selected>Selecione um tipo de usuário</option>
            <option value="Administrador"{{ old('type', $user->type  ?? '') == "Administrador" ? 'selected' : ''}}>Administrador</option>
            <option value="Usuario"{{ old('type', $user->type  ?? '') == "Usuario" ? 'selected' : ''}}>Usuário</option>
            <option value="Teste" {{ old('type', $user->type ?? '') == "Teste" ? 'selected' : ''}}>Teste</option>
        </select>
        <label for="type">Tipo de usuário</label>
        @error('type')
            <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
        @enderror
    </div>
</div> --}}





