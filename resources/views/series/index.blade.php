@extends('layout')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Título</th>
                <th scope="col">Lançamento</th>
                <th scope="col">Final</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($series as $serie)
                    <tr>
                        <th scope="row">{{ $serie->id }}</th>
                        <td>{{ $serie->title }}</td>
                        <td>{{ $serie->releaseDate }}</td>
                        <td>{{ $serie->endDate ?? 'Presente' }}</td>
                    </tr>
                @endforeach
            </tbody>
    </table>
@endsection