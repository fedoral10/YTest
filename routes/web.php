<?php

use Illuminate\Support\Facades\Route;
use Illuminate\http\Request;
use App\Gestion;
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

Route::middleware('auth')->group(function(){
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
    
    
    Route::get('/ticket', function (){
        return view('ticket.index');
    })->name('ticket.main');

});

