@extends('site.layout.principal')

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

{{-- Esse trecho está quebrando --}}
@section('card_city')
    <section class="section lighten-4 center">
        <div style="display: flex; flex-wrap; justify-content: space-around">
            @foreach ($cities as $city)
                <a href="{{ route('city.immobile.index', $city->id) }}">
                    <div class="card-panel" style="width: 280px; height: 100%;">
                        <i class="material-icons medium green-text text-lighten-3">room</i>
                        <h4 class="black-text truncate">{{ $city->name }}</h4>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection

@section('footer')
<br>
    <footer class="page-footer">
        <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Best Imoveis</h5>
                <p class="grey-text text-lighten-4">Esse sistema/site foi desenvolvido com intuito do aprendizado do framework PHP Laravel na sua versão 8</p>
                <p class="grey-text text-lighten-4">Para acessar a área administrativa <a class="grey-text text-lighten-2" href="{{ route('login') }}">clique aqui</a></p>
            </div>

            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li>
                        <a class="grey-text text-lighten-3" href="mailto:contato.herculanosilva@gmail.com">
                            <i class="medium material-icons">email
                            </i>
                        </a>
                        <a class="grey-text text-lighten-3" target="_blank" href="https://www.linkedin.com/in/laecioherculano/">
                            <i class="medium material-icons">account_box</i>
                        </a>
                        <a class="grey-text text-lighten-3" target="_blank" href="https://github.com/herculanosilva">
                            <i class="medium material-icons">code</i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        </div>
        <div class="footer-copyright">
        <div class="container">
            Developed by: Herculano Silva &lt;/&gt;
        </div>
        </div>
    </footer>
@endsection
