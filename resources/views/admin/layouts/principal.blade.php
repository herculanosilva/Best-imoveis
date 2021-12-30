<!DOCTYPE html>
<head>
    <html lang="pt-br">
        <meta charset="UTF-8">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <!-- import css public photo-->
        <link rel="stylesheet" href="{{ asset('css/photo.css')}}">

    <title>Best Imoveis</title>
</head>
<body>

    <nav>
        <div class="container">
            <div class="nav-wrapper">
                <a href="/home" class="brand-logo">Best Imóveis</a>
                 <ul class="right">
                    <li>
                        <a href="{{ route('admin.immobile.index') }}">Imóveis</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.city.index') }}">Cidades</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.type.index') }}">Tipos</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.finality.index') }}">Finalidades</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.user.index') }}">Usuários</a>
                    </li>
                    {{-- @if (Auth::user()->type  == 'Administrador')
                        <li class="nav-item dropdown {{ Route::is('access-log.index') ? 'active' : '' }}">
                            <a id="navbarDropdownLogs" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Logs
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownLogs">
                                <a class="dropdown-item" href="{{ route('access-log.index') }}">
                                    Log's de Acesso
                                </a>
                                <a class="dropdown-item" href="{{ route('log-viewer::logs.list') }}">
                                    Log's de Ação
                                </a>
                            </div>
                        </li>
                    @endif --}}
                    {{-- logout --}}
                    <li>
                        <a class="dropdown" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form style="display: inline" id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    {{-- end logout --}}
                    <!-- Dropdown Trigger -->
                        <a class='dropdown-trigger waves-effect' href='#' data-target='dropdown'>

                            <?php
                            $names = explode(' ', Auth::user()->name); // Array ( [0] => Williany [1] => Thalita [2] => Almeida [3] => Veras )
                            //Se existir o [1] => Thalita, então mostre o Williany Thalita, senão mostre o Williany
                            $twoNames = (isset($names[1])) ? $names[0]. ' ' .$names[1] : $names[0];
                            echo $twoNames;
                            ?>
                        </a>

                        <!-- Dropdown Structure -->
                        <ul id='dropdown' class='dropdown-content'>
                            <li><a href="#!">one</a></li>
                            <li><a href="#!">two</a></li>
                            <li><a href="#!">three</a></li>
                            <li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
                        </ul>
                        {{--  --}}
                </ul>
            </div>
        </div>
    </nav>

    {{-- conteudo principal --}}
    <div class="container">
        @yield('conteudo-principal')
    </div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <script>
        @if (session('sucesso'))
            M.toast({html: '{{ session('sucesso') }}'})
        @endif

        @if (session('erro'))
            M.toast({html: '{{ session('erro') }}'})
        @endif

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.dropdown-trigger');
            var instances = M.Dropdown.init(elems);
        });


        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });

    </script>

</body>
</html>

