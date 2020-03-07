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

                        <table class="table table-hover table-sm">
                            <thead>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Accion</th>
                            </thead>
                            <tbody>
                                @foreach($gestions as $gestion)
                                <tr>
                                    <th>{{$gestion->id}}</th>
                                    <th>{{$gestion->nombre}}</th>
                                    <th>
                                    <a href="javascript: document.getElementById('delete-{{ $gestion->id }}').submit()" class="btn btn-danger">Eliminar</a>
                                        <form id="delete-{{ $gestion->id }}" action="{{route('gestion.remove',$gestion->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            
                                        </form>
                                       
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection