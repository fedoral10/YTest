@extends('layout.layout')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Listado de Gestiones
                        <a href="{{ route('gestion.create') }}" class="btn btn-success btn-sm float-right">Nuevo</a>
                    </div>
                    <div class="card-body">
                        @if(session('info'))
                        <div class="alert alert-success">
                            {{ session('info') }}
                        </div>
                        @endif
                        @foreach($gestions as $gestion)
                            <button class="btn btn-primary">{{$gestion->nombre}}</button>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection