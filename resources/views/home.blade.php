@extends('admin.layouts.principal')

@section('conteudo-principal')
    <section class="section">
        <h2>implementar alguma coisas legal, tipo graficos e etc</h2>
        {{-- charts --}}
        {!! $chart->container() !!}
        <script src="{{ $chart->cdn() }}"></script>
        {{ $chart->script() }}
    </section>
@endsection
