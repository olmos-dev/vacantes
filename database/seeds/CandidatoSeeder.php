<?php

use App\Candidato;
use Illuminate\Database\Seeder;

class CandidatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //se crean candidatos
        factory(Candidato::class, 1000)->create();
    }
}
