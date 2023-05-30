<?php

use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //se crean usuarios
        factory(User::class, 100)->create();

        //se agregan dos usuarios
        User::create([
            'name' => 'Alberto',
            'email' => 'alberto@mail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('123')
        ]);
        User::create([
            'name' => 'Luis',
            'email' => 'luis@mail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('123')
        ]);
    }
}
