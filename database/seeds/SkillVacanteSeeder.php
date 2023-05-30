<?php

use App\Skill;
use App\Vacante;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillVacanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <=1000 ; $i++) { 
            DB::insert('insert into skill_vacante (skill_id,vacante_id) values (?, ?)', [
                Skill::all()->random()->id,
                Vacante::all()->random()->id
            ]);
        }
    }
}
