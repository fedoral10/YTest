@extends('layout.layout')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Titulo</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" />
                                <label for="">Direccion</label>
                                <input type="text" class="form-control" />
                                <label for="">Gestion Real Realizada</label>
                                <select class="form-control">
                                    <option>vacio</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Apellido</label>
                                <input type="text" class="form-control" />
                                <label for="">Telefono</label>
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""><b>Problema expuesto por el cliente</b></label>
                                <input type="text" class="form-control" />
                                <label for=""><b>Solucion brindada</b></label>
                                <input type="text" class="form-control" />
                            </div>
                            <br/>
                            <div class="col-md-12">
                                <a href="" class="btn btn-primary btn-sm float-right">Guardar Gestion</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header justify-content-center">
                        <a href="" class="btn btn-primary">Atender al cliente</a>
                        <a href="" class="btn btn-primary">Actualizar lista de tickets</a>
                    </div>
                    <div class="card-body">

                        <table class="table table-hover table-sm">
                            <thead>
                                <th>No.Ticket</th>
                                <th>Gestion Solicitada</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>


                </div>

            </div>
        </div>
    </div>
@endsection