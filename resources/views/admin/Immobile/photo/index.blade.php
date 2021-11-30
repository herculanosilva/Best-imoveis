@extends('admin.layouts.principal')

@section('conteudo-principal')
    <h4>{{ $immobile->title }}</h4>
    <section class="section">
        <div class="flex-container">
            @forelse ($photos as $photo)
                <div class="flex-item">
                    <span class="btn-closed">
                        <form action="{{ route('admin.immobile.photos.destroy', [$immobile->id, $photo->id]) }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button style="border:0; background:trasparent;" type="submit" title="remover">
                                <span style="cursor: pointer">
                                    <i class="material-icons red-text text-accent-3">delete_forever</i>
                                </span>
                            </button>
                         </form>
                    </span>
                    <img src="{{ asset("storage/$photo->url") }}" width="200" height="200" title="{{ $immobile->title }}">
                </div>
            @empty
             <h5>Não existe fotos para esse imovel! <a href="{{url()->previous()}}">Voltar</a></h5>
            @endforelse
        </div>
        {{-- botão add --}}
        <div class="fixed-action-btn">
            <a href="{{ route('admin.immobile.photos.create', $immobile->id) }}" class="btn-floating btn-large waves-effect waves-light red">
                <i class="material-icons">add</i></a>
            </a>
        </div>
    </section>
@endsection
