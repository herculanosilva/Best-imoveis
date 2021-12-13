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
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form style="display: inline" id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
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


        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
        });

    </script>

</body>
</html>

