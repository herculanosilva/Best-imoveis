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
    <title>Best Imoveis</title>
</head>
<body>
    {{-- menu topo --}}
    {{-- <nav>
        <div class="container">
            <div class="nav-wrapper">
                <a href="/" class="brand-logo center">Best Imóveis</a>
        </div>
    </nav> --}}
    <nav>
        <div class="nav-wrapper">
          <a href="/" class="brand-logo">Best Imóveis</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="{{ route('admin.immobile.index') }}">Login</a></li>
          </ul>
        </div>
    </nav>

    {{-- slide --}}
    @yield('slider')

    {{-- conteudo principal --}}
    <div class="container">
        @yield('conteudo-principal')
    </div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function(){
            //slider
            var sliders = document.querySelectorAll('.slider');
            M.Slider.init(sliders, {
                // indicatos
                // indicators:false,
                height:400,
                interval: 5000
            });
            // material box
            var boxes = document.querySelectorAll('.materialboxed');
            M.Materialbox.init(boxes);
        });
    </script>
</body>
</html>

