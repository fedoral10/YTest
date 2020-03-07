@extends('layout.layout')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Nueva Gestion
                    </div>
                    <div class="card-body">
                        <form action="{{ route('gestion.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nombre:</label>
                                <input type="text" name="nombre" class="form-control" id="">

                                <label for="">Aplica Visita Técnica:</label>
                                <input type="checkbox" name="aplicaVisitaTecnica" class="form-control" id="">

                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{route('gestion.list')}}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection