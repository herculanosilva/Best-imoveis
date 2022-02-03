@extends('admin.layouts.principal')

@section('conteudo-principal')
<br>
    {{-- exports --}}
    <div class="right-align">
        <a href="{{ route('admin.action-log.pdf', $search ?? '') }}" class="waves-effect waves-light red btn-small"><i class="material-icons left">picture_as_pdf</i>PDF</a>
        <a href="{{ route('admin.action-log.xlsx', $search ?? '') }}" class="waves-effect waves-light red btn-small"><i class="material-icons left">grid_on</i>EXCEL</a>

    </div>
    {{-- filtro de tipos --}}
    <section class="section">
        <form action="{{ route('admin.action-log.index') }}" method="get">
            <div class="row valign-wrapper">
                <div class="input-field col s12">
                    <input type="text" name="search" id="search" value="{{ $search }}">
                    <label for="search">Pesquisar</label>
                </div>
            </div>
            {{-- botão pesquisar --}}
            <div class="row right-align">
                <a href="{{ route('admin.action-log.index') }}" class="btn-flat waves-effect">Exibir todos</a>
                <button type="submit" class="btn waves-effect waves-alight">Pesquisar</button>
            </div>
        </form>
    </section>
    <hr>
    <table class="highlight">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ação</th>
                <th>Descrição</th>
                <th class="right-align">Data do registro</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($logs as $log)
                <tr>
                    <td>{{$log->id }}</td>
                    <td>{{$log->action}}</td>
                    <td>{{$log->description}}</td>
                    <td class="right-align">{{date('H:i:s d/m/Y', strtotime($log->created_at))}}</td>
                </tr>
            @empty
                <td colspan="2">Não existe registro de logs!</td>
            @endforelse
        </tbody>
    </table>


    {{-- paginação --}}
    <div class="center">
        {{ $logs->links('admin.shared.pagination')}}
    </div>
@endsection
</section>
