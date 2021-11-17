@extends('admin.layouts.principal')

@section('conteudo-principal')

    <table class="highlight">
        <thead>
            <tr>
                <th>Cidade</th>
                <th>Bairro</th>
                <th>titulo</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($immobiles as $immobile)
                <tr>
                    <td>{{ $immobile->city->name }}</td>
                    <td>{{ $immobile->address->district }}</td>
                    <td>{{ $immobile->title }}</td>
                    <td class="right-align">
                        <a href="{{ route('admin.immobile.edit', $immobile->id) }}">
                            <span>
                                <i class="material-icons grey-text text-darken-2">edit</i>
                            </span>
                        </a>
                        <form action="{{ route('admin.immobile.destroy', $immobile->id) }}" method="post" style="display: inline">
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
                    <td colspan="4">Não existem imoveis cadastrado!</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <section class="section">
        {{-- botão --}}
        <div class="fixed-action-btn">
            <a href="{{ route('admin.immobile.create') }}" class="btn-floating btn-large waves-effect waves-light red">
                <i class="material-icons">add</i></a>
            </a>
        </div>
    </section>
@endsection
