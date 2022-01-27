@extends('admin.layouts.principal')

@section('conteudo-principal')
<br>
    {{-- exports --}}
    <div class="right-align">
        <a href="{{ route('admin.typies.pdf', $search ?? '') }}" class="waves-effect waves-light red btn-small"><i class="material-icons left">picture_as_pdf</i>PDF</a>
        <a href="{{ route('admin.typies.xlsx', $search ?? '') }}" class="waves-effect waves-light red btn-small"><i class="material-icons left">grid_on</i>EXCEL</a>
    </div>
    {{-- filtro de tipos --}}
    <section class="section">
        <form action="#" method="get"> {{-- {{ route('admin.log.index') }} --}}
            <div class="row valign-wrapper">
                <div class="input-field col s12">
                    <input type="text" name="search" id="search" value="">  {{-- {{ $search }} --}}
                    <label for="search">Pesquisar</label>
                </div>
            </div>
            {{-- botão pesquisar --}}
            <div class="row right-align">
                <a href="#" class="btn-flat waves-effect">Exibir todos</a> {{-- {{ route('admin.log.index') }} --}}
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
                <th></th>
                <th>Descrição</th>
                <th class="right-align">Data do registro</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($logs as $log)
                <tr>
                    <td>{{$log->id }}</td> 
                    <td>{{$log->action}}</td>
                    <td>
                        @if ($log->action == "Failed")
                          <i class="material-icons red-text text-darken-2">report_problem</i>
                        @endif
                        @if ($log->action == "Login")
                          <i class="material-icons green-text text-darken-2">login</i>
                        @endif
                        @if ($log->action == "Logout")
                          <i class="material-icons indigo-text text-darken-2">logout</i>
                        @endif
                    </td>               
                    <td>{{$log->description}}</td>
                    <td class="right-align">{{$log->created_at}}</td>
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
