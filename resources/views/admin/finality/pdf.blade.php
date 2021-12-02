<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            .titulo{
                border: 1px;
                background-color:#c2c2c2;
                text-align: center;
                width: 100%;
                text-transform: uppercase;
                font-weight: bold;
                margin-bottom: 25px;
            }
            .tabela{
                width: 100%;
                text-transform: uppercase;
            }

            table th{
                text-align: left;
                padding-right: 5px;
            }
            table td{
                font-size: 10px;
                text-align: left;

            }

            /* quebra de pagina -> https://github.com/barryvdh/laravel-dompdf*/
            .page-break {
                page-break-after: always;
            }
        </style>
    </head>
    <body>
        <div class="titulo">Lista de finalidades</div>
        <table class="tabela">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Finalidade</th>
                    <th>Ultima atualização</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($finalities as $key => $finality)
                    <tr>
                        <td>{{$finality->id}}</td>
                        <td>{{$finality->name}}</td>
                        <td>{{date('H:i d/m/Y', strtotime($finality->updated_at)) }}</td>
                    </tr>
                @endforeach
            <tbody>
        </table>
    </body>
</html>
