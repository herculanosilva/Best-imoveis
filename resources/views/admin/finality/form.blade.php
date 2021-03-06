@extends('admin.layouts.principal')
@section('conteudo-principal')
    <section class="section">
        <form action="{{ $action }}" method="POST">
            @csrf
            {{-- verificando se estamos editando --}}
            @isset($finality)
                @method('PUT')
            @endisset

            <div class="input-field">
                <input type="text" name="name" id="name" value="{{old('name', $finality->name ?? '')}}" required autofocus />
                <label for="name">Nome</label>
                @error('name')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>

            <div class="right-align">
                <a href={{route('admin.finality.index') }} class="btn-flat waves-effect"> Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">Salvar</button>
            </div>
        </form>
    </section>
@endsection
