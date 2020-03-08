<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Prueba de PHP</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Tickets</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">Realizar Gestion<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/gestion">Catalogo de Gestiones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/ticket">Atender Tickets</a>
            </li>
            
            </ul>
        </div>
        <li class="nav-item">
            <a class="btn btn-danger btn-sm float-right" href="javascript: document.getElementById('logout').submit()">Cerrar Sesion</a>
            <form id="logout" method="post" action="{{route('logout')}}" display="none">
                @csrf
            </form>
        </li>
    </nav>
    
    <div class="my-4">
        @yield('contenido')
    </div>
</body>

</html>