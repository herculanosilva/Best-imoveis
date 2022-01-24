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

                    <!-- Dropdown Trigger -->
                    <a class='dropdown-trigger waves-effect' href='#' data-target='dropdown'>
                        <?php
                        $names = explode(' ', Auth::user()->name); // Array ( [0] => Williany [1] => Thalita [2] => Almeida [3] => Veras )
                        //Se existir o [1] => Thalita, então mostre o Williany Thalita, senão mostre o Williany
                        $twoNames = (isset($names[1])) ? $names[0]. ' ' .$names[1] : $names[0];
                        echo $twoNames;
                        ?>
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>

                    <!-- Dropdown Structure -->
                    <ul id='dropdown' class='dropdown-content'>
                        <li><a href="{{ route('admin.profile.index')}}">Meu perfil</a></li>
                            @if (Auth::user()->type  == 'Administrador')
                                <li><a href="{{ route('admin.access-log.index') }}">Log acesso</a></li>
                                <li><a href="#!">Log ação</a></li>
                            @endif
                        <li>
                            <a class="dropdown" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <span class="red-text text-accent-4">Sair</span>
                            </a>
                            <form style="display: inline" id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
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

