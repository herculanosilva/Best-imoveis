@extends('admin.principal')
@section('conteudo-principal')
    <section class="section">
        <form action="{{ route('admin.cidades.adicionar') }}" method="POST">
            @csrf
            <div class="input-field">
                <input type="text" name="name" id="name" required autofocus>
                <label for="name">Nome</label>
                @error('nome')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>

            <div class="right-align">
                <a href="{{ url()->previous() }}" class="btn-flat waves-effect"> Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">Salvar</button>
            </div>
        </form>
    </section>
@endsection
