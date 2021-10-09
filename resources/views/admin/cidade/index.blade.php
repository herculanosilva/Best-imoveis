@extends('admin.principal')

@section('conteudo-principal')
    <section class="section">
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
                        <td class="right-align">Excluir - Remover</td>
                    </tr>
                @empty
                    <td colspan="2">Não existe cidade cadastrada!</td>
                @endforelse
            </tbody>
        </table>
    </section>
@endsection
