<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class rol extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rol')->insert([
            'id_rol'=>'1',
            'ro'=>'supremo',
            'descripcion'=>'Todo lo ve y todo lo puede hacer'

        ]);

        DB::table('rol')->insert([
            'id_rol'=>'2',
            'ro'=>'admin',
            'descripcion'=>'Tiene permisos predeterminados'

        ]);

        DB::table('rol')->insert([
            'id_rol'=>'3',
            'ro'=>'user',
            'descripcion'=>'permisos limitados'

        ]);

        DB::table('rol')->insert([
            'id_rol'=>'4',
            'ro'=>'personal',
            'descripcion'=>'Habilita los dispositivos que se requiere para el sistema'

        ]);
    }
}
