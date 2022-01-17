<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Oscar',
            'email' => 'oscar@mail.com',
            'password' => Hash::make('12345678'),
            'url' => 'https://oscar-aguilar.com',
        ]);

        $user->perfil()->create();

        $user2 = User::create([
            'name' => 'Pedro',
            'email' => 'pedro@mail.com',
            'password' => Hash::make('12345678'),
            'url' => 'https://oscar-aguilar.com',
        ]);

        $user2->perfil()->create();

    }
}
