@extends('admin.layouts.principal')

@section('conteudo-principal')
    <section class="section">
        <form action="{{ $action }}" action="POST">
            @csrf

            {{-- titulo --}}
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="title" id="title">
                    <label for="title">Titulo</label>
                </div>
            </div>

            {{-- cidade --}}
            <div class="row">
                <div class="input-field col s12">
                    <select name="city_id" id="city_id">
                        <option value="" disabled>Selecione uma cidade</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                    <label for="city_id">Cidade</label>
                </div>
            </div>

            {{-- tipo --}}
            <div class="row">
                <div class="input-field col s12">
                    <select name="type_id" id="type_id">
                        <option value="" disabled>Selecione um tipo de  imovel</option>
                        @foreach ($typies as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    <label for="type_id">Tipo</label>
                </div>
            </div>

            {{-- finalidade --}}
            <div class="row">
                @foreach ($finalities as $finality)
                    <span class="col s2">
                        <label style="margin-right: 30px">
                            <input class="with-gap" name="finality_id" type="radio" id="finality_id" value="{{ $finality->id }}" checked />
                            <span>{{ $finality->name }}</span>
                        </label>
                    </span>
                @endforeach
            </div>

            {{-- preço dormitorios e salas --}}
            <div class="row">
                <div class="input-field col s4">
                    <input type="number" name="price" id="price">
                    <label for="price">Preço</label>
                </div>
                <div class="input-field col s4">
                    <input type="number" name="room" id="room">
                    <label for="room">Quantidade de dormitórios</label>
                </div>
                <div class="input-field col s4">
                    <input type="number" name="living_room" id="living_room">
                    <label for="living_room">Quantidade de salas</label>
                </div>
            </div>


        </form>
    </section>
@endsection
