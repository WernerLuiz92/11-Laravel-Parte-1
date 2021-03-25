@extends('layout')

@section('content')
    <div class="card mb-3">
        <div class="d-flex">
            <img class="card-img" style="max-height: 350px; width: auto;" src="{{ $serieImgUrl }}" alt="...">
            <div class="card-body">
                <h4 class="card-title">{{ $serieTitle }}</h4>
                <p class="card-text">{{ $serieSynopsis }}</p>
                <p class="card-text"><small class="text-muted">Último episódio <time class="timeago" datetime="{{ $serieLastEpisode }}"></time></small></p>
                <span class="badge bg-light rounded-pill border text-dark d-inline-flex align-items-center p-2 mb-1">
                    <span class="me-2">Temporadas </span><span class="badge rounded-pill bg-danger">{{ $seasons->count() }}</span>
                    <span class="visually-hidden">total de temporadas</span>
                </span>
                <span class="badge bg-light rounded-pill border text-dark d-inline-flex align-items-center p-2">
                    <span class="me-2">Episódios </span><span class="badge rounded-pill bg-danger">{{ array_sum($qtyEpisodes) }}</span>
                    <span class="visually-hidden">total de episódios</span>
                </span>
            </div>
        </div>
    </div>
    <div class="row row-cols-auto d-flex justify-content-center">
        @foreach ($seasons as $season)
            <div class="card col col-2 ms-3 mt-3 text-dark bg-light">
                <div class="card-body">
                    <h5 class="card-title">Temporada {{ $season->number }}</h5>
                    <hr>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $seasonYear[$season->id] ?? '' }}</h6>
                    <p class="card-text"></p>
                    <a href="{{ route('episodes.index', $season->id) }}" class="card-link link-dark stretched-link">Episódios</a><span class="badge bg-secondary ms-3">{{ $qtyEpisodes[$season->id] }}</span>
                </div>
            </div>
        @endforeach
    </div>
@endsection