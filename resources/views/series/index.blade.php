@extends('layout')

@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="width:4%">ID</th>
                    <th scope="col" style="width:44%">Título</th>
                    <th scope="col" style="width:4%"></th>
                    <th scope="col" style="width:19%">Lançamento</th>
                    <th scope="col" style="width:19%">Final</th>
                    <th scope="col" style="width:10%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($series as $serie)
                    <tr>
                        <th scope="row">{{ $serie->id }}</th>
                        <td class="series-titles">
                            <span id="serie-title-{{ $serie->id }}">{{ $serie->title }}</span>
                            <div class="input-serie-title" hidden id="input-serie-title-{{ $serie->id }}">
                                <div class="input-group input-group-sm">
                                    <input 
                                        type="text" 
                                        class="form-control"
                                        id="input-serie-title-field-{{ $serie->id }}" 
                                        placeholder="Título da série" 
                                        value="{{ $serie->title }}" 
                                        aria-label="Título da série" 
                                        aria-describedby="input-serie-title-btn-{{ $serie->id }}">
                                    <button 
                                        class="btn btn-sm btn-outline-primary" 
                                        type="button" 
                                        id="input-serie-title-btn-{{ $serie->id }}" 
                                        onclick="updateSerie(<?= $serie->id; ?>)">
                                        <i class="bi bi-check"></i>
                                    </button>
                                    @csrf
                                </div>
                            </div>
                        </td>
                        <td>
                            <button class="series-titles-btns btn btn-sm btn-outline-dark ms-2" id="toggle-input-btn-{{ $serie->id }}" onclick="toggleInput(<?= $serie->id; ?>)">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </td>
                        <td>{{ date('d/m/Y', strtotime($serie->releaseDate)) }}</td>
                        <td>{{ $serie->endDate ? date('d/m/Y', strtotime($serie->endDate)) : 'Presente' }}</td>
                        <td>
                            <div class="d-flex justify-content-evenly">
                                <a href="{{ route('seasons.index', $serie->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-box-arrow-up-right"></i></a>
                                <form action="/series/{{ $serie->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
                                </form>
                                <form action="/series/{{ $serie->id }}" method="POST"
                                    onsubmit="return confirm('Tem certeza que desja excluir a série: {{ addslashes($serie->title) }}')"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('pageScript')
    <script>
        function toggleInput(serieId) {
            const titleSerieEl = document.getElementById(`serie-title-${serieId}`);
            const inputSerieEl = document.getElementById(`input-serie-title-${serieId}`);
            const inputFieldEl = document.getElementById(`input-serie-title-field-${serieId}`);
            const titleSeriesEls = document.querySelectorAll(".series-titles");
            const titleSeriesBtnsEls = document.querySelectorAll(".series-titles-btns");
            const toggleInputBtn = document.getElementById(`toggle-input-btn-${serieId}`);
            
            if (titleSerieEl.hasAttribute('hidden')) {
                titleSerieEl.removeAttribute('hidden');
                inputSerieEl.hidden = true;
                toggleInputBtn.classList.remove('active');
            } else {
                titleSeriesEls.forEach(input => {
                    input.querySelector('span').removeAttribute('hidden');
                    input.querySelector('.input-serie-title').hidden = true;
                });
                titleSeriesBtnsEls.forEach(btn => {
                    btn.classList.remove('active');
                });
                inputSerieEl.removeAttribute('hidden');
                titleSerieEl.hidden = true;
                inputFieldEl.focus();
                inputFieldEl.select();
                toggleInputBtn.classList.add('active');
            }
        }

        function updateSerie(serieId) {
            let formData = new FormData();

            const serieTitle = document.querySelector(`#input-serie-title-field-${serieId}`).value;
            const token = document.querySelector('input[name="_token"]').value;
            const url = `/series/${serieId}/titleUpdate`;

            formData.append('title', serieTitle);
            formData.append('_token', token);

            fetch(url, {
                body: formData,
                method: 'POST'
            });

            toggleInput(serieId);
            document.getElementById(`serie-title-${serieId}`).textContent = serieTitle;
        }

    </script>
@endsection