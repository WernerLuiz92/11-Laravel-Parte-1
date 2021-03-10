@extends('layout')

@section('content')
    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Título</label>
            <input type="text" class="form-control" id="name" placeholder="Título da Série">
        </div>
        
        <button class="btn btn-success btn-sm">Salvar</button>
    </form>
@endsection