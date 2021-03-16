@extends('layout')

@section('content')
    <div class="table-responsive">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Título</th>
                    <th scope="col">Lançamento</th>
                    <th scope="col">Final</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($series as $serie)
                        <tr>
                            <th scope="row">{{ $serie->id }}</th>
                            <td>{{ $serie->title }}</td>
                            <td>{{ $serie->releaseDate }}</td>
                            <td>{{ $serie->endDate ?? 'Presente' }}</td>
                            <td>
                                <form class="me-1 d-inline" action="/series/{{ $serie->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
                                </form>
                                <form class="d-inline" action="/series/{{ $serie->id }}" method="POST"
                                    onsubmit="return confirm('Tem certeza que desja excluir a série: {{ addslashes($serie->title) }}')"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
@endsection