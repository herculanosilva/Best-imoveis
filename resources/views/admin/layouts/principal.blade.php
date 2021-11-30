<!DOCTYPE html>
<head>
    <html lang="pt-br">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- import css public photo-->
    <link rel="stylesheet" href="{{ asset('css/photo.css')}}">
    <title>Best Imoveis</title>
</head>
<body>
    {{-- menu topo --}}
    <nav>
        <div class="container">
            <div class="nav-wrapper">
                <a href="/" class="brand-logo">Best Imóveis</a>
                <ul class="right">
                    <li>
                        <a href="{{ route('admin.immobile.index') }}">Imóveis</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.city.index') }}">Cidades</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.type.index') }}">Tipo</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.finality.index') }}">Finalidade</a>
                    </li>
                </ul>
        </div>
    </nav>

    {{-- conteudo principal --}}
    <div class="container">
        @yield('conteudo-principal')
    </div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

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

