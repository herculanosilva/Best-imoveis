@extends('admin.layouts.principal')
@section('conteudo-principal')
    <section class="section">
        {{-- O atributo enctype especifica como os dados do formulário devem ser codificados ao enviá-los ao servidor --}}
        <form action="{{ route('admin.immobile.photos.store', $immobile->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="file-field input-field">
                <div class="btn">
                    <span>Selecionar Foto</span>
                    <input type="file" name="photo" id="photo">
                </div>
                <div class="file-path-wrapper">
                    <input type="text" class="file-path validate">
                </div>
            </div>
            <div class="right-align">
                <a href="{{ url()->previous() }}" class="btn-flat waves-effect">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">Salvar</button>
            </div>
        </form>
    </section>
@endsection
