<?php

use App\Gestion;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function crearUsuarios(){
        User::create([
            'name' => 'Jorge',
            'lastname' => 'Potosme',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
        ]);
    }

    public function crearGestiones(){
        $gestiones = array(
            'Arreglo de Pago',
            'Cancelacion',
            'Compra',
            'Nuevo Servicio',
            'Reclamo',
            'Renovacion',
            'Soporte Tecnico',
            'Devolucion',
            'Consulta',
            'Reemplazo'
        );

        foreach($gestiones as $gestion){
            $obj = new Gestion();
            $obj->nombre = $gestion;
            $obj->aplicaVisitaTecnica = 0;
            $obj->user_id = 1;
            $obj->usuario= "admin";
            $obj->save();
        }
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->crearUsuarios();
        $this->crearGestiones();
    }

    
}
