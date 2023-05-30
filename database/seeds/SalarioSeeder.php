<?php

use App\Salary;
use Illuminate\Database\Seeder;

class SalarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Salary::create([
            'nombre' => '0 - 1000 USD'
        ]);
        Salary::create([
            'nombre' => '1000 - 2000 USD'
        ]);
        Salary::create([
            'nombre' => '2000 - 4000 USD'
        ]);
        Salary::create([
            'nombre' => 'Confidencial'
        ]);
    }
}
