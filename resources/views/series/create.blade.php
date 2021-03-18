@extends('layout')

@section('content')
    <form method="post">
        @csrf
        <div class="row">
            <div class="col col-6 mb-3">
                <div class="form-floating">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Título da Série">
                    <label for="title">Título da Série</label>
                </div>
            </div>
            <div class="col col-3 mb-3">
                <div class="form-floating">
                    <input type="number" min="1" class="form-control" id="qtdSeasons" name="qtdSeasons" placeholder="Nº de Temporadas">
                    <label for="qtdSeasons">Nº de Temporadas</label>
                </div>
            </div>
            <div class="col col-3 mb-3">
                <div class="form-floating">
                    <input type="number" min="1" class="form-control" id="qtdEpisodes" name="qtdEpisodes" placeholder="Ep. por Temporada">
                    <label for="qtdEpisodes">Ep. por Temporada</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-6 mb-3">
                <div class="form-floating">
                    <input type="date" class="form-control" id="releaseDate" name="releaseDate" placeholder="Data de Lançamento">
                    <label for="releaseDate">Data de Lançamento</label>
                </div>
            </div>
            <div class="col col-6 mb-3">
                <div class="form-floating">
                    <input type="date" class="form-control" id="endDate" name="endDate" placeholder="Data de Encerramento">
                    <label for="endDate">Data de Encerramento</label>
                </div>
            </div>     
        </div>
        <button class="btn btn-success btn-sm">Salvar</button>
    </form>
@endsection