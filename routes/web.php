<?php

use Illuminate\Support\Facades\Route;
use Illuminate\http\Request;
use App\Gestion;
use App\GestionCliente;
use App\Ticket;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        //$gestions = Gestion::all();
        //return view('welcome');
        $gestions = Gestion::orderBy('created_at', 'desc')->get();
        return view('main', compact('gestions'));
    });

    Route::get('/gestion', function () {
        $gestions = Gestion::all();
        return view('gestion.index', compact('gestions'));
    })->name('gestion.list');

    Route::get('/gestion/all', function () {
        $gestions = Gestion::all();
        return $gestions;
    })->name('gestion.list');

    Route::get('/gestion/create', function () {
        return view('gestion.create');
    })->name('gestion.create');

    Route::post('/gestion', function (Request $request) {
        $newGestion = new Gestion;
        $newGestion->nombre = $request->input('nombre');
        $newGestion->aplicaVisitaTecnica = $request->input('aplicaVisitaTecnica');
        $newGestion->save();

        return redirect()->route('gestion.list')->with('info', 'Creado Exitosamente!');
    })->name('gestion.store');

    Route::delete('/gestion/rm/{id}', function ($id) {
        $gestion = Gestion::findOrFail($id);
        $gestion->delete();
        return redirect()->route('gestion.list')->with('info', 'Eliminado Exitosamente!');
    })->name('gestion.remove');


    Route::get('/ticket/all',function (){
        $gestionesCliente = GestionCliente::where('atendido', '=', 0)->orderBy('created_at', 'asc')->get();

        return $gestionesCliente;
    });

    Route::get('/ticket', function () {
        return view('ticket.index');
    })->name('ticket.main');

    Route::post('/gestionCliente/new', function (Request $request) {

        //return  $request->input('nombre');

        $gestionCliente = new GestionCliente();
        $gestionCliente->atendido = 0;
        $gestionCliente->nombreGestion = $request->input('nombre');
        $gestionCliente->user_id = Auth::id();

        //echo $request->input('nombre');

        return $gestionCliente->save();
    })->name('gestionCliente.new');

    Route::post('/ticket/new',function(Request $request){
        $ticket = new Ticket();
        $gestionCli = $request->input('gestionClienteId');
        $gestionCliente = GestionCliente::findOrFail($gestionCli['id']);
        $gestionCliente->atendido=1;
        $gestionCliente->save();
        //$gestionCli['nombreGestion']
        $ticket->gestionCliente_id = $gestionCli['id'];        
        $ticket->nombre= $request->input('nombre');
        $ticket->apellido= $request->input('apellido');
        $ticket->direccion= $request->input('direccion');
        $ticket->telefono= $request->input('telefono');
        $ticket->problemaExpuesto= $request->input('problemaExpuesto');
        $ticket->solucionBrindada= $request->input('solucion');
                
        return $ticket->save();
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
