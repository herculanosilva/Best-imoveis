@extends('admin.layouts.principal')

@section('conteudo-principal')
    <section class="section">
        <form action="{{ $action }}" method="POST">
            @csrf

            {{-- titulo --}}
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="title" id="title" value="{{ old('title') }}">
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
                            <option value="{{ $city->id }}" {{old('city_id') == $city->id ? 'selected' : ''}}>{{ $city->name }}</option>
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
                            <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : ''}}>{{ $type->name }}</option>
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
                            <input type="radio" name="finality_id" id="finality_id" class="with-gap" value="{{$finality->id}}" {{old('finality_id') == $finality->id ? 'checked' : ''}}/>
                            <span>{{ $finality->name }}</span>
                        </label>
                    </span>
                @endforeach
                @error('finality_id')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>

            {{-- preço dormitorios e salas --}}
            <div class="row">
                <div class="input-field col s4">
                    <input type="number" name="price" id="price" value="{{ old('price') }}>
                    <label for="price">Preço</label>
                    @error('price')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
                <div class="input-field col s4">
                    <input type="number" name="room" id="room" value="{{ old('room') }}">
                    <label for="room">Quantidade de dormitórios</label>
                    @error('room')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
                <div class="input-field col s4">
                    <input type="number" name="living_room" id="living_room" value="{{ old('living_room') }}">
                    <label for="living_room">Quantidade de salas</label>
                    @error('living_room')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>

            {{-- terreno banheiros e garagens --}}
            <div class="row">
                <div class="input-field col s4">
                    <input type="number" name="ground" id="ground" value="{{ old('ground') }}">
                    <label for="ground">Terreno em m²</label>
                    @error('ground')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
                <div class="input-field col s4">
                    <input type="number" name="bathroom" id="bathroom" value="{{ old('bathroom') }}">
                    <label for="bathroom">Quantidade de banheiros</label>
                    @error('bathroom')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
                <div class="input-field col s4">
                    <input type="number" name="garage" id="garage" value="{{ old('garage') }}">
                    <label for="garage">Vagas na garagem</label>
                    @error('garage')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>

            {{-- descrição --}}
            <div class="row">
              <div class="input-field col s12">
                  <textarea name="description" id="description" class="materialize-textarea">{{ old('description') }}</textarea>
                <label for="description">Descrição</label>
                @error('description')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
               </div>
            </div>

            {{-- Rua --}}
            <div class="row">
                <div class="input-field col s5">
                    <input type="text" name="street" id="street" value="{{ old('street') }}">
                    <label for="street">Rua</label>
                    @error('street')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>

            {{-- Número --}}
                <div class="input-field col s2">
                    <input type="number" name="number" id="number" value="{{ old('number') }}">
                    <label for="number">Número</label>
                    @error('number')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>

            {{-- Complemento --}}
                <div class="input-field col s2">
                    <input type="text" name="complement" id="complement" value="{{ old('complement') }}">
                    <label for="complement">Complemento</label>
                    @error('complement')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>

            {{-- Bairo --}}
                <div class="input-field col s3">
                    <input type="text" name="district" id="district" value="{{ old('district') }}">
                    <label for="district">Bairo</label>
                    @error('district')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>

            {{-- Proximity --}}
            <div class="row">
                <div class="input-field col s12">
                    <select name="proximity[]" id="proximity" multiple>
                        <option value="" disabled>Selecione os pontos de interesse nas aproximidades</option>
                            @foreach ($proximities as $proximity)
                                <option value="{{ $proximity->id }}"
                                    @if (old('proximity'))
                                        {{in_array($proximity->id, old('proximity')) ? 'selected' : ''}}
                                    @endif
                                    >{{ $proximity->name }}</option>
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



{{-- in_array - checa se um valor existe em um array in_array($valor_procurado, array $o_array, bool $strict = ?): bool --}}
