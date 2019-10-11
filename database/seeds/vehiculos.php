<?php

use Illuminate\Database\Seeder;

class vehiculos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('vehiculo')->insert([
            'id_tipo'=>'1',
            'nombr_ve'=>'liviano',
            'peso'=>'3',
            'distan_ini'=>'15',
            'distan_fin'=>'45',
            'activo'=>'true'
        ]);


        DB::table('vehiculo')->insert([
            'id_tipo'=>'2',
            'nombr_ve'=>'mediano',
            'peso'=>'8',
            'distan_ini'=>'45',
            'distan_fin'=>'65',
            'activo'=>'true'
        ]);

        DB::table('vehiculo')->insert([
            'id_tipo'=>'3',
            'nombr_ve'=>'pesado',
            'peso'=>'15',
            'distan_ini'=>'65',
            'distan_fin'=>'125',
            'activo'=>'true'
        ]);
    }
}
