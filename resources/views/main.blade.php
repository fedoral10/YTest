@extends('layout.layout')
@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Gestiones
                    <a href="{{ route('gestion.create') }}" class="btn btn-success btn-sm float-right">Nuevo</a>
                </div>
                <div class="card-body">
                    @foreach($gestions as $gestion)
                    <button onclick="onBtnClick({{$gestion}})" class="btn btn-primary mt-2 pt-3 pb-3 pr-5 pl-5">{{$gestion->nombre}}</button>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function onBtnClick(gestion) {
        const token = document.querySelector('meta[name="csrf-token"]').content;
        let options = {
            method: 'post',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json; charset=utf-8',
                "X-CSRF-TOKEN": token
            },
            body: JSON.stringify(gestion)
        }

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        console.log(gestion);

        fetch('/gestionCliente/new', options).then(function(res) {
            console.log('la respuesta')
            console.log(res);
            return res.text();
        }).then(function(json) {
            //console.log('el json')
            console.log(json);
            Toast.fire({
                icon: 'success',
                title: 'Gestion Creada Exitosamente!!!'
            })
        })
    }
</script>
@endsection