<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(departamento::class);
        // $this->call(rol::class);
        // $this->call(vehiculos::class);
        // $this->call(ciudad::class);
        // $this->call(interfaz::class);
        $this->call(CiudTableSeeder::class);

    }
}
