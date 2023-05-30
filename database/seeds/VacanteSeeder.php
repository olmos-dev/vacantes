<?php

use App\Vacante;
use Illuminate\Database\Seeder;

class VacanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //se crean vacantes
        factory(Vacante::class, 500)->create();
    }
}
