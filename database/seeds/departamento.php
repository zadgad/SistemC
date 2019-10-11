<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class departamento extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamento')->insert([
            'id_dep'=>'1',
            'nomb'=>'Cochabamba'

        ]);
        DB::table('departamento')->insert([
            'id_dep'=>'2',
            'nomb'=>'La Paz'

        ]);
        DB::table('departamento')->insert([
            'id_dep'=>'3',
            'nomb'=>'Santa Cruz'

        ]);
        DB::table('departamento')->insert([
            'id_dep'=>'4',
            'nomb'=>'Oruro'

        ]);
        DB::table('departamento')->insert([
            'id_dep'=>'5',
            'nomb'=>'Beni'

        ]);
        DB::table('departamento')->insert([
            'id_dep'=>'6',
            'nomb'=>'Pando'

        ]);
        DB::table('departamento')->insert([
            'id_dep'=>'7',
            'nomb'=>'Sucre'

        ]);
        DB::table('departamento')->insert([
            'id_dep'=>'8',
            'nomb'=>'Tarija'

        ]);
        DB::table('departamento')->insert([
            'id_dep'=>'9',
            'nomb'=>'Potosi'

        ]);
    }

}
