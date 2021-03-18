@extends('layout')

@section('content')
    <h1>{{ $serieTitle }}</h1>
    <div class="row row-cols-auto">
        @foreach ($seasons as $season)
            <div class="card col col-2 ms-3 mt-3">
                <div class="card-body">
                    <h5 class="card-title">Temporada {{ $season->number }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Ano: {{ $season->releaseDate ?? '' }}</h6>
                    <p class="card-text"></p>
                    <a href="#" class="card-link stretched-link">Episódios</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection