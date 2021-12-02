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
                font-size: 8px;
                text-align: left;

            }

            /* quebra de pagina -> https://github.com/barryvdh/laravel-dompdf*/
            .page-break {
                page-break-after: always;
            }
        </style>
    </head>
    <body>
        <div class="titulo">Lista de imóveis</div>
        <table class="tabela">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>M²</th>
                    <th>Salas</th>
                    <th>WC</th>
                    <th>Quartos</th>
                    <th>Garagem</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Endereço</th>
                    <th>Tipo</th>
                    <th>Finalidade</th>
                    <th>Ultima atualização</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($immobiles as $key => $immobile)
                    <tr>
                        <td>{{ $immobile->title }}</td>
                        <td>{{ $immobile->ground }}</td>
                        <td>{{ $immobile->living_room }}</td>
                        <td>{{ $immobile->bathroom }}</td>
                        <td>{{ $immobile->room }}</td>
                        <td>{{ $immobile->garage }}</td>
                        <td>{{ $immobile->description }}</td>
                        <td>{{ $immobile->price }}</td>
                        <td>
                            {{ $immobile->address->street }}, nº
                            {{ $immobile->address->number }},
                            {{ $immobile->address->district }},
                            {{ $immobile->address->complement }} -
                            {{ $immobile->city->name }}
                        </td>
                        <td>{{ $immobile->type->name }}</td>
                        <td>{{ $immobile->finality->name }}</td>
                        <td>{{date('H:i d/m/Y', strtotime($immobile->updated_at)) }}</td>
                    </tr>
                @endforeach
            <tbody>
        </table>
    </body>
</html>
