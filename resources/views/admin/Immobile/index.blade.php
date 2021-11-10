@extends('admin.layouts.principal')

@section('conteudo-principal')

    <section class="section">
        {{-- botão --}}
        <div class="fixed-action-btn">
            <a href="{{ route('admin.immobile.create') }}" class="btn-floating btn-large waves-effect waves-light red">
                <i class="material-icons">add</i></a>
            </a>
        </div>
    </section>
@endsection
