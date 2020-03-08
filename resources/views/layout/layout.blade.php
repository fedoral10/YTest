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
    <a class="btn btn-danger btn-sm float-right" href="javascript: document.getElementById('logout').submit()">Cerrar Sesion</a>
    <form id="logout" method="post" action="{{route('logout')}}" display="none">
        @csrf
    </form>
    <div class="my-4">
        @yield('contenido')
    </div>
</body>

</html>