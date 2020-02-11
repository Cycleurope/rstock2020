<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'          => 'Vincent Lombard',
            'username'      => 'RLOMVIN',
            'email'         => 'vincent.lombard@cycleurope.fr',
            'password'      => '$2y$10$dE38r95yyuGoutHqhlTo2.AXqVhiODhEX/Atob2Cl00tYTDk1xhb2',
            'address1'      => '161, rue Gabriel Péri',
            'address2'      => '',
            'postalcode'    => '10104',
            'city'          => 'Romilly-sur-Seine',
            'role'          => 'admin',
        ]);

    }
}
