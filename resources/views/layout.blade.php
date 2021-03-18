<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Font Awesome && Bootstrap Icons --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    {{-- Google Fonts Roboto --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    {{-- Bootstrap core CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    {{-- Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <title>{{ $pageTitle ?? 'Laravel MVC' }}</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href={{ route('home.index') }}>Laravel MVC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href={{ route('home.index') }}>Página Inicial</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href={{ route('series.index') }} id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Gêneros</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown04">
                        <li><a class="dropdown-item" href="#">Terror</a></li>
                        <li><a class="dropdown-item" href="#">Comédia</a></li>
                        <li><a class="dropdown-item" href="#">Ação</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{ route('series.index') }}>Séries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{ route('series.create') }}>Nova Série</a>
                </li>
            </ul>
            <ul class="navbar-nav me-1 mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
            <div class="search-form">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar uma série" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                    </div>
            </div>
            </div>
        </div>
    </nav>
    {{-- Chama a Flash Message --}}
    <x-alert/>
    <div class="container mt-3">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">{{ $pageTitle ?? '' }}</li>
            </ol>
        </nav>
    </div>
    <div class="container mt-3">
        @yield('content')
    </div>
    {{-- Bootstrap Bundle JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    @yield('alert')
</body>
</html>