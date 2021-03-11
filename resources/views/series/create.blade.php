@extends('layout')

@section('content')
    <form method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Título da Série">
        </div>
        <div class="mb-3">
            <label for="releaseDate" class="form-label">Data de Lançamento</label>
            <input type="date" class="form-control" id="releaseDate" name="releaseDate">
        </div>
        <div class="mb-3">
            <label for="endDate" class="form-label">Data de Encerramento</label>
            <input type="date" class="form-control" id="endDate" name="endDate">
        </div>        
        <button class="btn btn-success btn-sm">Salvar</button>
    </form>
@endsection