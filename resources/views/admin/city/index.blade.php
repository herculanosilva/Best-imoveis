@extends('admin.layouts.principal')

@section('conteudo-principal')
    <section class="section">
        {{-- exports --}}
        <div class="right-align">
            <a href="{{ route('admin.cities.xlsx') }}" class="waves-effect waves-light red btn-small"><i class="material-icons left">border_clear</i>EXCEL</a>
            <a href="" class="waves-effect waves-light red btn-small"><i class="material-icons left">picture_as_pdf</i>PDF</a>
        </div>
        {{-- table --}}
        <table class="highlight">
            <thead>
                <tr>
                    <th>Cidades</th>
                    <th class="right-align">Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cities as $city)
                    <tr>
                        <td>{{ $city->name }}</td>
                        <td class="right-align">
                            <a href="{{ route('admin.city.edit', $city->id) }}">
                                <span>
                                    <i class="material-icons grey-text text-darken-2">edit</i>
                                </span>
                            </a>
                            <form action="{{ route('admin.city.destroy', $city->id) }}" method="post" style="display: inline">
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
                    <td colspan="2">Não existe cidade cadastrada!</td>
                @endforelse
            </tbody>
        </table>

        {{-- botão --}}
        <div class="fixed-action-btn">
            <a href="{{ route('admin.city.create') }}" class="btn-floating btn-large waves-effect waves-light red">
                <i class="material-icons">add</i></a>
            </a>
        </div>
    </section>
@endsection

