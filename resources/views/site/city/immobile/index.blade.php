@extends('site.layout.principal')

@section('conteudo-principal')
    <h3>Imóveis disponiveis em {{ $city->name }}</h3>
    <div class="divider">

    </div>
    <div style="display: flex; flex-wrap: wrap">
        @forelse ($immobiles as $immobile)
            <div class="card" style="width: 260px; margin: 10px;">
                <div class="card-image">
                    @if (count($immobile->photo) > 0)
                        <img src="{{ asset("storage/{$immobile->photo[0]->url}") }}">
                    @endif
                </div>
                <div class="card-content">
                    <p class="card-title">
                        {{ $immobile->title }}
                    </p>
                    <p>
                        Finalidade: <strong>{{ $immobile->finality->name }}</strong>
                    </p>
                    <p>
                        Preço: <strong>{{ $immobile->price }}</strong>
                    </p>
                </div>
                <div class="card-action">
                    <a href="{{ route('city.immobile.show', [$city->id, $immobile->id]) }}" class="green-text">Ver detalhes</a>
                </div>
            </div>
        @empty
            <div class="center">
                <p>Não existem imóveis disponíveis nessa cidade no momento!
                    <a href="{{url()->previous()}}">Voltar</a>
                </p>
            </div>
        @endforelse
    </div>
    <div class="center">
        {{ $immobiles->links('admin.shared.pagination') }}
    </div>
@endsection
