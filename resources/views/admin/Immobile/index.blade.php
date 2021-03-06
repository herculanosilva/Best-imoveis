@extends('admin.layouts.principal')

@section('conteudo-principal')
<br>
{{-- exports --}}
<div class="right-align">{{--{{ route('admin.immobiles.pdf'), $filters['search'] ?? '') }}--}}
    <a href="{{ route('admin.immobiles.pdf', $filters['search'] ?? '') }}" class="waves-effect waves-light red btn-small"><i class="material-icons left">picture_as_pdf</i>PDF</a>
    <a href="{{ route('admin.immobiles.xlsx', array('city_id' => $city_id ?? '' , 'title' => $title ?? '') ) }}" class="waves-effect waves-light red btn-small"><i class="material-icons left">grid_on</i>EXCEL</a>
</div>
    {{-- filtro de imoveis --}}
    <section class="section">
        <form action="{{ route('admin.immobile.index') }}" method="get">
            <div class="row valign-wrapper">
                <div class="input-field col s6">
                    <select name="city_id" id="city">
                        <option value="">Secione uma cidade</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}" {{ $city->id == $city_id ? 'selected' : ''}}>{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-field col s6">
                    <input type="text" name="title" id="title" value="{{ $title }}">
                    <label for="title">Titulo</label>
                </div>
            </div>
            {{-- botão pesquisar --}}
            <div class="row right-align">
                <a href="{{ route('admin.immobile.index') }}" class="btn-flat waves-effect">Exibir todos</a>
                <button type="submit" class="btn waves-effect waves-alight">Pesquisar</button>
            </div>
        </form>
    </section>
    <hr>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Titulo</th>
                    <th>Ultima alteração</th>
                    <th class="right-align">Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($immobiles as $immobile)
                    <tr>
                        <td>{{ $immobile->city->name }}</td>
                        <td>{{ $immobile->district }}</td>
                        <td>{{ $immobile->title }}</td>
                        <td>{{ $immobile->updated_at->format('H:i d-m-Y ') }}</td>
                        <td class="right-align">
                            {{-- visualizar --}}
                            <a href="{{ route('admin.immobile.photos.index', $immobile->id) }}" title="Foto">
                                <span>
                                    <i class="material-icons green-text text-lighten-1">insert_photo</i>
                                </span>
                            </a>
                            {{-- visualizar --}}
                            <a href="{{ route('admin.immobile.show', $immobile->id) }}" title="Ver">
                                <span>
                                    <i class="material-icons indigo-text text-darken-2">remove_red_eye</i>
                                </span>
                            </a>
                            {{-- editar --}}
                            <a href="{{ route('admin.immobile.edit', $immobile->id) }}" title="Editar">
                                <span>
                                    <i class="material-icons grey-text text-darken-2">edit</i>
                                </span>
                            </a>
                            {{-- excluir --}}
                            <form action="{{ route('admin.immobile.destroy', $immobile->id) }}" method="post" style="display: inline" title="Excluir">
                                @csrf
                                @method('DELETE')

                                <button style="border:0;background:transparent;" type="submit">
                                    <span style="cursor: pointer">
                                        <i class="material-icons red-text text-accent-3">delete_forever</i>
                                    </span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Não existem imoveis cadastrado ou que atenda aos criterios de pesquisa!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{-- paginação --}}
        <div class="center">
            {{ $immobiles->links('admin.shared.pagination')}}
        </div>
        <section class="section">
            {{-- botão --}}
            <div class="fixed-action-btn">
                <a href="{{ route('admin.immobile.create') }}" class="btn-floating btn-large waves-effect waves-light red pulse">
                    <i class="material-icons">add</i></a>
                </a>
            </div>
        </section>
@endsection
</section>

