@extends('admin.layouts.principal')

@section('conteudo-principal')
<br>
<section class="section">
    <h6 class="mb-3">Dados do Usuário</h6>
    {{-- nome --}}
    <div class="row">
        <div class="input-field col s12">
            <input readonly type="text" name="name" id="name" value="{{ $user->name }}"/>
            <label for="name">Nome</label>
        </div>
    </div>
    {{-- email --}}
    <div class="row">
        <div class="input-field col s12">
            <input readonly type="text" name="email" id="email" value="{{ $user->email }}"/>
            <label for="email">E-mail</label>
        </div>
    </div>
<br>
    <h4 class="mb-3">Atualizar a senha</h4>
    <form action="{{ route('admin.profile.update', $user->id) }}" method="POST">
        @method('PUT')
        @csrf
        {{-- senha antiga --}}
        <div class="row">
            <div class="input-field col s12">
                <input type="password" name="currentPassword" id="currentPassword"  autofocus />
                <label for="currentPassword">Senha Atual</label>
                @error('currentPassword')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>
        </div>
        {{-- senha --}}
        <div class="row">
            <div class="input-field col s12">
                <input type="password" name="newPassword" id="newPassword"  autofocus />
                <label for="newPassword">Nova Senha</label>
                @error('newPassword')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>
        </div>
        {{-- confirmação de senha --}}
        <div class="row">
            <div class="input-field col s12">
                <input type="password" name="newPassword_confirmation" id="newPassword_confirmation"  autofocus />
                <label for="newPassword_confirmation">Confirme a Senha</label>
                @error('newPassword_confirmation')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>
        </div>

        {{-- botões de ações --}}
        <div class="right-align">
            <a href={{route('admin.user.index') }} class="btn-flat waves-effect"> Cancelar</a>
            <button class="btn waves-effect waves-light" type="submit">Salvar</button>
        </div>
    </form>
</section>

@endsection
