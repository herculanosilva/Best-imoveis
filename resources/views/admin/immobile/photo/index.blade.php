@extends('admin.layouts.principal')

@section('conteudo-principal')
    <h4>{{ $immobile->title }}</h4>
    <section class="section">
        @forelse ($photos as $photo)
            <div>{{ $photo->url }}</div>
        @empty
            <h5>Não existe fotos para esse imovel! </h5>
        @endforelse

        {{-- botão add --}}
        <div class="fixed-action-btn">
            <a href="{{ route('admin.immobile.photos.create', $immobile->id) }}" class="btn-floating btn-large waves-effect waves-light red">
                <i class="material-icons">add</i></a>
            </a>
        </div>
    </section>
@endsection
