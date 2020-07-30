<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class interfaz extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('iu')->insert([
            'id_iu'=>'1',
            'descripcion'=>'Inicio'

        ]);

        DB::table('iu')->insert([
            'id_iu'=>'2',
            'descripcion'=>'Administrador'

        ]);

        DB::table('iu')->insert([
            'id_iu'=>'3',
            'descripcion'=>'Empleado'

        ]);

        DB::table('iu')->insert([
            'id_iu'=>'4',
            'descripcion'=>'Usuario'

        ]);

        DB::table('iu')->insert([
            'id_iu'=>'5',
            'descripcion'=>'Supremo'

        ]);

        DB::table('iu')->insert([
            'id_iu'=>'6',
            'descripcion'=>'Otros'

        ]);
    }
}
