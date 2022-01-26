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
        <form action="{{ route('admin.type.index') }}" method="get">
            <div class="row valign-wrapper">
                <div class="input-field col s12">
                    <input type="text" name="search" id="search" value="{{ $search }}">
                    <label for="search">Pesquisar</label>
                </div>
            </div>
            {{-- botão pesquisar --}}
            <div class="row right-align">
                <a href="{{ route('admin.type.index') }}" class="btn-flat waves-effect">Exibir todos</a>
                <button type="submit" class="btn waves-effect waves-alight">Pesquisar</button>
            </div>
        </form>
    </section>
    <hr>
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

@endsection
</section>

@foreach ($logs as $log)
<tr>
    <td>{{$log->id}}</td>
    <td>{{$log->action}}</td>
    <td>{{$log->description}}</td>
    <td>{{$log->created_at}}</td>
</tr>
<br>
@endforeach


{{--
<!--work collections start-->
            <div id="work-collections">
              <div class="row">
                <div class="col s12 m12 l6">
                  <ul id="projects-collection" class="collection z-depth-1">
                    <li class="collection-item avatar">
                      <i class="material-icons cyan circle">bug_report</i>
                      <h6 class="collection-header m-0">Projects</h6>
                      <p>Your Favorites</p>
                    </li>
                    <li class="collection-item">
                      <div class="row">
                        <div class="col s9">
                          <p class="collections-title">O usuario: Administrator realizou o login</p>
                          <p class="collections-content">31/12/2022 12:00:00</p>
                        </div>
                        <div class="col s3">
                          <span class="task-cat cyan">Logout</span>
                        </div>
                      </div>
                    </li>
                    <li class="collection-item">
                      <div class="row">
                        <div class="col s9">
                          <p class="collections-title">Mobile App for Social</p>
                          <p class="collections-content">iSocial App</p>
                        </div>
                        <div class="col s3">
                          <span class="task-cat red accent-2">Falha de login</span>
                        </div>
                      </div>
                    </li>
                    <li class="collection-item">
                      <div class="row">
                        <div class="col s9">
                          <p class="collections-title">Website</p>
                          <p class="collections-content">MediTab</p>
                        </div>
                        <div class="col s3">
                          <span class="task-cat teal accent-4">Login</span>
                        </div>
                      </div>
                    </li>
                    <li class="collection-item">
                      <div class="row">
                        <div class="col s9">
                          <p class="collections-title">AdWord campaign</p>
                          <p class="collections-content">True Line</p>
                        </div>
                        <div class="col s3">
                          <span class="task-cat deep-orange accent-2">SEO</span>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>

                </div>
              </div>
            </div>
            <!--work collections end-->
    --}}
