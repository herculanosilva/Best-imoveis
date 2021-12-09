@extends('admin.layouts.principal')

@section('conteudo-principal')
        <section class="section section-daily-stats center">
            <div class="row">
                <div class="col m3 card-max">
                    <div class="card-panel red lighten-1 white-text center">
                        <i class="material-icons medium">location_on</i>
                        <h5>Cidades</h5>
                        <h3 class="count">{{ $qtd_cities }}</h3>
                    </div>
                </div>
                <div class="col m3 card-max">
                    <div class="card-panel red lighten-1 white-text center">
                        <i class="material-icons medium">location_city</i>
                        <h5>Tipos</h5>
                        <h3 class="count">{{ $qtd_typies }}</h3>
                    </div>
                </div>
                <div class="col m3 card-max">
                    <div class="card-panel red lighten-1 white-text center">
                        <i class="material-icons medium">gps_fixed</i>
                        <h5>Finalidades</h5>
                        <h3 class="count">{{ $qtd_finalities }}</h3>
                    </div>
                </div>
                <div class="col m3 card-max">
                    <div class="card-panel red lighten-1 white-text center">
                        <i class="material-icons medium">assignment_ind</i>
                        <h5>Usuários</h5>
                        <h3 class="count">{{ $qtd_users }}</h3>
                    </div>
                </div>
          </section>

        {{-- charts --}}
        {!! $pieChart->container() !!}
        <script src="{{ $pieChart->cdn() }}"></script>
        {{ $pieChart->script() }}

@endsection
