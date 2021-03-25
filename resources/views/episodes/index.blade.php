@extends('layout')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Data de Lançamento</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($episodes as $episode)
                <tr>
                    <th scope="row">{{ $episode->number }}</th>
                    <td>{{ $episode->title }}</td>
                    <td>{{ date('d/m/Y', strtotime($episode->releaseDate)) }}</td>
                    <td>@mdo</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection