
@foreach ($logs as $log)
<tr>
    <td>{{$log->id}}</td>
    <td>{{$log->action}}</td>
    <td>{{$log->description}}</td>
    <td>{{$log->created_at}}</td>
</tr>
<br>
<<<<<<< Updated upstream
@endforeach
=======
    {{-- exports --}}
    <div class="right-align">
        <a href="{{ route('admin.access-log.pdf', $search ?? '') }}" class="waves-effect waves-light red btn-small"><i class="material-icons left">picture_as_pdf</i>PDF</a>
        <a href="{{ route('admin.accesslog.xlsx', $search ?? '') }}" class="waves-effect waves-light red btn-small"><i class="material-icons left">grid_on</i>EXCEL</a>
    </div>
    {{-- filtro de tipos --}}
    <section class="section">
        <form action="{{ route('admin.access-log.index') }}" method="get">
            <div class="row valign-wrapper">
                <div class="input-field col s12">
                    <input type="text" name="search" id="search" value="{{ $search }}">
                    <label for="search">Pesquisar</label>
                </div>
            </div>
            {{-- botão pesquisar --}}
            <div class="row right-align">
                <a href="{{ route('admin.access-log.index') }}" class="btn-flat waves-effect">Exibir todos</a>
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
                    <td class="right-align">{{date('H:i:s d/m/Y', strtotime($log->created_at))}}</td>
                </tr>
            @empty
                <td colspan="2">Não existe registro de logs!</td>
            @endforelse
        </tbody>
    </table>
>>>>>>> Stashed changes

