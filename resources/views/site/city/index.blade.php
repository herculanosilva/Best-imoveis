@extends('site.layout.principal')

@section('conteudo-principal')
    <section class="section lighten-4 center">
        <div style="display: flex; flex-wrap; justify-content: space-around">
            @foreach ($cities as $city)
                <a href="{{ route('city.immobile.index', $city->id) }}">
                    <div class="card-panel" style="width: 280px; height: 100%;">
                        <i class="material-icons medium green-text text-lighten-3">room</i>
                        <h4 class="black-text">{{ $city->name }}</h4>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection

@section('slider')
    <section class="slider">
        <hr>
        <ul class="slides">
            <li>
                <img src="https://source.unsplash.com/2d4lAQAlbDA/1900x600" alt="">
                <div class="caption center-align">
                    <h2 style="text-shadow: 2pt 2px 8px #1b5e20">
                        Encontre os melhores imóveis da cidade.
                    </h2>
                </div>
            </li>
            <li>
                <img src="https://source.unsplash.com/eWqOgJ-lfiI/1900x600" alt="">
                <div class="caption left-align">
                    <h2 style="text-shadow: 2px 2px 8px #1b5e20">
                        Os melhores imóveis para aluguel.
                    </h2>
                </div>
            </li>
            <li>
                <img src="https://source.unsplash.com/4ojhpgKpS68/1900x600" alt="">
                <div class="caption right-align">
                    <h2 style="text-shadow: 2pt 2px 8px #1b5e20">
                        Os melhores imóveis para venda.
                    </h2>
                </div>
            </li>
        </ul>
    </section>
@endsection
