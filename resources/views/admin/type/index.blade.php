@extends('admin.layouts.principal')

@section('conteudo-principal')
    <section class="section">
        {{-- exports --}}
        <div class="right-align">
            <a href="{{ route('admin.typies.pdf') }}" class="waves-effect waves-light red btn-small"><i class="material-icons left">picture_as_pdf</i>PDF</a>
            <a href="{{ route('admin.typies.xlsx') }}" class="waves-effect waves-light red btn-small"><i class="material-icons left">grid_on</i>EXCEL</a>
        </div>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Tipos</th>
                    <th class="right-align">Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($types as $type)
                    <tr>
                        <td>{{ $type->name }}</td>
                        <td class="right-align">
                            <a href="{{ route('admin.type.edit', $type->id) }}">
                                <span>
                                    <i class="material-icons grey-text text-darken-2">edit</i>
                                </span>
                            </a>
                            <form action="{{ route('admin.type.destroy', $type->id) }}" method="post" style="display: inline">
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
                    <td colspan="2">Não existe tipo de imoveis cadastrado!</td>
                @endforelse
            </tbody>
        </table>
        {{-- paginação --}}
        <div class="center">
            {{ $types->links('admin.shared.pagination')}}
        </div>

        {{-- botão --}}
        <div class="fixed-action-btn">
            <a href="{{ route('admin.type.create') }}" class="btn-floating btn-large waves-effect waves-light red">
                <i class="material-icons">add</i></a>
            </a>
        </div>
    </section>
@endsection

