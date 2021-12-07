@extends('admin.layouts.principal')

@section('conteudo-principal')
        <section class="section section-daily-stats center">
            <div class="row">
                <div class="col m3 card-max">
                    <div class="card-panel red lighten-1 white-text center">
                        <i class="material-icons medium">location_on</i>
                        <h5>Cidades</h5>
                        <h3 class="count">{{ $qtd_cidades }}</h3>
                    </div>
                </div>
                <div class="col m3 card-max">
                    <div class="card-panel red lighten-1 white-text center">
                        <i class="material-icons medium">location_city</i>
                        <h5>Tipos</h5>
                        <h3 class="count">{{ $qtd_tipos }}</h3>
                    </div>
                </div>
                <div class="col m3 card-max">
                    <div class="card-panel red lighten-1 white-text center">
                        <i class="material-icons medium">gps_fixed</i>
                        <h5>Finalidades</h5>
                        <h3 class="count">{{ $qtd_finalidade }}</h3>
                    </div>
                </div>
                <div class="col m3 card-max">
                    <div class="card-panel red lighten-1 white-text center">
                        <i class="material-icons medium">assignment_ind</i>
                        <h5>Usuários</h5>
                        <h3 class="count">{{ $qtd_usuarios }}</h3>
                    </div>
                </div>
          </section>

          {{-- charts --}}
        {{-- {!! $chart->container() !!}
        <script src="{{ $chart->cdn() }}"></script>
        {{ $chart->script() }} --}}

@endsection







