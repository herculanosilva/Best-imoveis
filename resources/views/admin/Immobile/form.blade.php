@extends('admin.layouts.principal')

@section('conteudo-principal')
    <section class="section">
        <form action="{{ $action }}" method="POST">
            @csrf

            {{-- titulo --}}
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="title" id="title">
                    <label for="title">Titulo</label>
                    @error('title')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>

            {{-- cidade --}}
            <div class="row">
                <div class="input-field col s12">
                    <select name="city_id" id="city_id">
                        <option value="" disabled selected>Selecione uma cidade</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                    <label for="city_id">Cidade</label>
                    @error('city_id')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>

            {{-- tipo --}}
            <div class="row">
                <div class="input-field col s12">
                    <select name="type_id" id="type_id">
                        <option value="" disabled selected>Selecione um tipo de  imovel</option>
                        @foreach ($typies as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    <label for="type_id">Tipo</label>
                    @error('type_id')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
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
                        @error('finality_id')
                            <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                        @enderror
                    </span>
                @endforeach
            </div>

            {{-- preço dormitorios e salas --}}
            <div class="row">
                <div class="input-field col s4">
                    <input type="number" name="price" id="price">
                    <label for="price">Preço</label>
                    @error('price')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
                <div class="input-field col s4">
                    <input type="number" name="room" id="room">
                    <label for="room">Quantidade de dormitórios</label>
                    @error('room')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
                <div class="input-field col s4">
                    <input type="number" name="living_room" id="living_room">
                    <label for="living_room">Quantidade de salas</label>
                    @error('living_room')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>

            {{-- terreno banheiros e garagens --}}
            <div class="row">
                <div class="input-field col s4">
                    <input type="number" name="ground" id="ground">
                    <label for="ground">Terreno em m²</label>
                    @error('ground')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
                <div class="input-field col s4">
                    <input type="number" name="bathroom" id="bathroom">
                    <label for="bathroom">Quantidade de banheiros</label>
                    @error('bathroom')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
                <div class="input-field col s4">
                    <input type="number" name="garage" id="garage">
                    <label for="garage">Vagas na garagem</label>
                    @error('garage')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>

            {{-- descrição --}}
            <div class="row">
              <div class="input-field col s12">
                  <textarea name="description" id="description" class="materialize-textarea"></textarea>
                <label for="description">Descrição</label>
                @error('description')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
               </div>
            </div>

            {{-- Rua --}}
            <div class="row">
                <div class="input-field col s5">
                    <input type="text" name="street" id="street">
                    <label for="street">Rua</label>
                    @error('street')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>

            {{-- Número --}}
                <div class="input-field col s2">
                    <input type="number" name="number" id="number">
                    <label for="number">Número</label>
                    @error('number')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>

            {{-- Complemento --}}
                <div class="input-field col s2">
                    <input type="text" name="complement" id="complement">
                    <label for="complement">Complemento</label>
                    @error('complement')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>

            {{-- Bairo --}}
                <div class="input-field col s3">
                    <input type="text" name="district" id="district">
                    <label for="district">Bairo</label>
                    @error('district')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>

            {{-- Proximity --}}
            <div class="row">
                <div class="input-field col s12">
                    <select multiple name="proximity[]" id="proximity">
                        <option value="" disabled selected>Selecione os pontos de interesse nas aproximidades</option>
                            @foreach ($proximities as $proximity)
                                <option value="{{ $proximity->id }}">{{ $proximity->name }}</option>
                            @endforeach
                    </select>
                    <label>Pontos de Referência</label>
                    @error('proximity')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>

            <div class="right-align">
                <a href={{route('admin.immobile.index') }} class="btn-flat waves-effect"> Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">Salvar</button>
            </div>
        </form>
    </section>
@endsection



