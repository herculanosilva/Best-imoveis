@extends('site.layout.principal')

@section('conteudo-principal')
    <h4>{{ $immobile->title }}</h4>

    <section class="section">
        <div class="row">
            {{-- cidade --}}
            <span class="col s12">
                <h5>Cidade :</h5>
                <p>{{ $immobile->city->name }}</p>
            </span>
            {{-- tipo --}}
            <span class="col s12">
                <h5>Tipo do imovel :</h5>
                <p>{{ $immobile->type->name }}</p>
            </span>
            {{-- finalidade --}}
            <span class="col s12">
                <h5>Finalizade :</h5>
                <p>{{ $immobile->finality->name }}</p>
            </span>
        </div>

        <div class="row">
            {{-- preço --}}
            <span class="col s4">
                <h5>Preço :</h5>
                <p>{{ $immobile->price }}</p>
            </span>
            {{-- dormitórios --}}
            <span class="col s4">
                <h5>Dormitórios :</h5>
                <p>{{ $immobile->room }}</p>
            </span>
            {{-- salas --}}
            <span class="col s4">
                <h5>Salas :</h5>
                <p>{{ $immobile->living_room }}</p>
            </span>
        </div>

        <div class="row">
            {{-- terreno --}}
            <span class="col s4">
                <h5>Terreno (m²) :</h5>
                <p>{{ $immobile->ground }}</p>
            </span>
            {{-- banheiros --}}
            <span class="col s4">
                <h5>Banheiros :</h5>
                <p>{{ $immobile->bathroom }}</p>
            </span>
            {{-- garragens --}}
            <span class="col s4">
                <h5>Garragens :</h5>
                <p>{{ $immobile->garage }}</p>
            </span>
        </div>


        {{-- proximidades --}}
        <div class="row">
            <h5>Proximidades :</h5>
            <div style="display: flex; flex-wrap: wrap;">
                {{-- relacionamento N para N, logo retorna uma array com todas as proximity desse immobile --}}
                @foreach ($immobile->proximity as $proximity)
                    <span style="margin-right: 25px; font-wight: 600;"> {{ $proximity->name }} </span>
                @endforeach
            </div>
        </div>

        {{-- endereço --}}
        <div class="row">
            <span class="col s12">
                <h5>Endereço :</h5>
                <p>{{ $immobile->address->street }}, nº {{ $immobile->address->number }}, {{ $immobile->address->district }}, {{ $immobile->address->complement }}.</p>
            </span>
        </div>

        {{-- descrição --}}
        <div class="row">
            <span class="col s12">
                <h5>Descrição :</h5>
                <p>{{ $immobile->description }}</p>
            </span>
        </div>
        {{-- imagens do imovel --}}
        <section class="section">
            <h4 class="center">
                <span class="teal-text">Imagens</span> do Imóvel
            </h4>
            <div style="display: flex; flex-wrap: wrap; justify-content: space-around">
                @foreach ($immobile->photo as $photo)

                    <img style="margin: 2px" width="220" height="130" src="{{asset("storage/{$photo->url}")}}"
                    class="materialboxed">
                @endforeach
            </div>
        </section>

    </section>
     {{-- btn voltar --}}
     <div class="right-align">
        <a href="{{url()->previous()}}" class="waves-effect waves-light btn light-blue darken-2">Voltar</a>
    </div>
@endsection
