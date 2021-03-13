<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
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
            <a class="navbar-brand" href="/">Laravel MVC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Página Inicial</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/series" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Gêneros</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown04">
                        <li><a class="dropdown-item" href="#">Terror</a></li>
                        <li><a class="dropdown-item" href="#">Comédia</a></li>
                        <li><a class="dropdown-item" href="#">Ação</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/series">Séries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/series/create">Nova Série</a>
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
    <div class="container mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">{{ $pageTitle ?? '' }}</li>
            </ol>
        </nav>
    </div>
    <div class="container mt-2">
        @yield('content')
    </div>
    {{-- Bootstrap Bundle JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    {{-- Alert Auto Close --}}
    <script>
        window.setTimeout(function() {
            $(".auto-close").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);
    </script>
    <script>
    var option = {
        animation : true,
        delay : 5000,
        autohide : true,
    }
    var toastElList = [].slice.call(document.querySelectorAll(".toast"));
    var toastList = toastElList.map(function (toastEl) {
        return new bootstrap.Toast(toastEl, option);
    });

    $(window).on("load", function(){
        toastList.forEach(toast => {
            toast.show();
        });
    })
    </script>
</body>
</html>