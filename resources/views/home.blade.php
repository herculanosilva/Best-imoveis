@extends('admin.layouts.principal')

@section('conteudo-principal')
    <section class="section">

        <div class="row">
            <div class="col s12 m4">
                <div class="card red lighten-2">
                    <div class="card-content white-text">
                    <span class="card-title">Imóveis</span>
                    <p class="center" style="font-size: 25px"><b>00</b></p>
                    </div>
                    <div class="card-action">
                    <a href="#">Visualizar</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card red lighten-2">
                    <div class="card-content white-text">
                    <span class="card-title">Cidades</span>
                    <p class="center" style="font-size: 25px"><b>00</b></p>
                    </div>
                    <div class="card-action">
                    <a href="#">Visualizar</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card red lighten-2">
                    <div class="card-content white-text">
                    <span class="card-title">Tipos</span>
                    <p class="center" style="font-size: 25px"><b>00</b></p>
                    </div>
                    <div class="card-action">
                    <a href="#">Visualizar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m4">
                <div class="card red lighten-2">
                    <div class="card-content white-text">
                    <span class="card-title">Finalidades</span>
                    <p class="center" style="font-size: 25px"><b>00</b></p>
                    </div>
                    <div class="card-action">
                    <a href="#">Visualizar</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card red lighten-2">
                    <div class="card-content white-text">
                    <span class="card-title">Usuários</span>
                    <p class="center" style="font-size: 25px"><b>00</b></p>
                    </div>
                    <div class="card-action">
                    <a href="#">Visualizar</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card red lighten-2">
                    <div class="card-content white-text">
                    <span class="card-title">??</span>
                    <p class="center" style="font-size: 25px"><b>00</b></p>
                    </div>
                    <div class="card-action">
                    <a href="#">Visualizar</a>
                    </div>
                </div>
            </div>
        </div>



        {{-- charts --}}
        {{-- {!! $chart->container() !!}
        <script src="{{ $chart->cdn() }}"></script>
        {{ $chart->script() }} --}}
    </section>
@endsection
