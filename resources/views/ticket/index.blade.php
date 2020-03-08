@extends('layout.layout')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 id="titulo"></h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Nombre</label>
                            <input id="nombre" type="text" class="form-control" tabindex=1 />
                            <label for="">Direccion</label>
                            <input id="direccion" type="text" class="form-control" tabindex=3/>
                            <label for="">Gestion Real Realizada</label>
                            <select id="selectGestion" class="form-control" tabindex=5>
                                <option>vacio</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">Apellido</label>
                            <input id="apellido" type="text" class="form-control" tabindex=2 />
                            <label for="">Telefono</label>
                            <input id="telefono" type="text" class="form-control" tabindex=4/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for=""><b>Problema expuesto por el cliente</b></label>
                            <input id="problemaExpuesto" type="text" class="form-control" tabindex=7/>
                            <label for=""><b>Solucion brindada</b></label>
                            <input id="solucion" type="text" class="form-control" tabindex=8/>
                        </div>
                        <br />
                        <div class="col-md-12">
                            <a href="#" tabindex=9 onclick="guardaTicketHandler()" class="btn btn-primary btn-sm float-right mt-2">Guardar Gestion</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header justify-content-center">
                    <a href="#" onclick="atenderCliente()" class="btn btn-primary">Atender al cliente</a>
                    <a href="#" onclick="actualizaHandler()" class="btn btn-primary">Actualizar lista de tickets</a>
                </div>
                <div class="card-body">

                    <table class="table table-hover table-sm">
                        <thead>
                            <th>No.Ticket</th>
                            <th>Gestion Solicitada</th>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
                    </table>

                </div>


            </div>

        </div>
    </div>
</div>
<script>
    const token = document.querySelector('meta[name="csrf-token"]').content;
    let options = {
        method: 'get',
        credentials: 'same-origin',
        headers: {
            'Content-Type': 'application/json; charset=utf-8',
            "X-CSRF-TOKEN": token
        }
        //body: JSON.stringify(gestion)
    }
    var ticket = undefined
    let gestionClienteList=[]
    let titulo = document.getElementById('titulo')

    let nombre = document.getElementById('nombre')
    let apellido = document.getElementById('apellido')
    let direccion = document.getElementById('direccion')
    let telefono = document.getElementById('telefono')
    let gestionRealizada = document.getElementById('selectGestion')
    let problemaExpuesto = document.getElementById('problemaExpuesto')
    let solucion = document.getElementById('solucion')
    
    function clearTexts(){
        nombre.value=''
        nombre.value=''
        apellido.value=''
        direccion.value=''
        telefono.value=''
        gestionRealizada.value=1
        problemaExpuesto.value=''
        solucion.value=''
    }

    window.onload = async function() {
        setTable()
        setListGestion()
    }

    function actualizaHandler(){
        setTable()
    }
    
    async function setTable(){
        gestionClienteList = await getGestionClients();
        if(gestionClienteList.length>0){
            titulo.innerText="Hay tickets pendientes"
        } else {
            titulo.innerText="No hay tickets pendientes"
        }
        let tbody = document.getElementById('tbody');
        console.log(gestionClienteList);
        let rows = gestionClienteList.map(item=>{
            return "<tr> <td>"+item.id+"</td> <td>"+item.nombreGestion+"</td> </tr>"
        })
        tbody.innerHTML=rows.toString().replace(/,/g,' ');
    }

    async function getGestionClients() {
        options.method='get'
        options.body = undefined
        return new Promise((resolve, reject) => {
            fetch('/ticket/all', options).then(function(res) {
                return res.json();
            }).then(function(json) {
                resolve(json);
            }).catch(err=>{
                console.log(err)
                reject(err)
            })
        })
    }

    async function getGestionList() {
        options.method='get'
        options.body = undefined
        return new Promise((resolve, reject) => {
            fetch('/gestion/all', options).then(function(res) {
                return res.json();
            }).then(function(json) {
                resolve(json);
            }).catch(err=>{
                console.log(err)
                reject(err)
            })
        })
    }

    async function setListGestion(){
        let datos = await getGestionList();
        let select = document.getElementById('selectGestion');
        console.log(datos);
        let options = datos.map(item=>{
            return '<option value="'+item.id+'">"'+item.nombre+'"</option>'
        })
        select.innerHTML=options.toString().replace(/,|\"/g,' ');
    }

    function atenderCliente(){
        ticket={}
        if(gestionClienteList.length == 0){
            Swal.fire({
                icon: 'info',
                title: 'Tickets',
                text: 'No hay tickets pendientes',
                })
            return
        }

        ticket.gestionClienteId=gestionClienteList[0];
        ticket.nombre = nombre.value
        ticket.apellido = apellido.value
        ticket.direccion = direccion.value
        ticket.telefono = telefono.value
        ticket.gestionRealizada = gestionRealizada.value
        ticket.problemaExpuesto = problemaExpuesto.value
        ticket.solucion = solucion.value

        console.log(ticket)

        titulo.innerText = "Ticket #"+ticket.gestionClienteId.id+" | "+ticket.gestionClienteId.nombreGestion

        
    }


    async function guardaTicketHandler(){
    
        if(ticket){
            let response = await sendTicket(ticket)
            console.log(response)
        }else{
            Swal.fire({
                icon: 'info',
                title: 'Oops...',
                text: 'Debe hacer click en Atender Al Cliente para continuar con la cola de tickets',
                })
            }
    }

    function sendTicket(ticket){
        options.method='post'
        options.body=JSON.stringify(ticket)
        return new Promise((resolve, reject) => {
            fetch('/ticket/new', options).then(function(res) {
                return res.text();
            }).then(function(json) {
                resolve(json);
                Swal.fire({
                icon: 'success',
                title: 'Atentido',
                text: 'Se ha atendido el ticket!',
                })
                clearTexts()
                setTable()
            }).catch(err=>{
                console.log(err)
                reject(err)
            })
        })
    }
</script>
@endsection