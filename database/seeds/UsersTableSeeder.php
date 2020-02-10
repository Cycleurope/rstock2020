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

        $user = User::create([
            'name'          => 'Les Cycles Troyens',
            'username'      => '70110019',
            'email'         => 'les.cycles.troyens@gmail.com',
            'password'      => '$2y$10$4EeiJCLp67htyc/kNc7p5.TAvhWjRfONwptjThVyVHUTwSTYue53W',
            'address1'      => 'Rue Georges Clémenceau',
            'address2'      => '',
            'postalcode'    => '10000',
            'city'          => 'Troyes',
            'role'          => 'dealer',
        ]);

        $user = User::create([
            'name'          => 'Yousign - Compte Expert Test',
            'username'      => 'YOUSIGN',
            'email'         => 'hello@yousign.fr',
            'password'      => '$2y$10$bK4KQJNEz3IuA/pSZ9KCd.0QtyoSue/4E/WtcRVO7qnDfnWOAxU/y',
            'address1'      => '8 allée Henri Pigis',
            'address2'      => '',
            'postalcode'    => '14000',
            'city'          => 'Caen',
            'phone'         => '+33184880289',
            'role'          => 'dealer'
        ]);

        $user = User::create([
            'name'          => 'Yousign - Compte Admin Test',
            'username'      => 'YOUSIGNADMIN',
            'email'         => 'helloadmin@yousign.fr',
            'password'      => '$2y$10$bK4KQJNEz3IuA/pSZ9KCd.0QtyoSue/4E/WtcRVO7qnDfnWOAxU/y',
            'address1'      => '8 allée Henri Pigis',
            'address2'      => '',
            'postalcode'    => '14000',
            'city'          => 'Caen',
            'phone'         => '+33184880289',
            'role'          => 'admin'
        ]);

        $user = User::create([
            'name'          => 'Danny MONTELS',
            'username'      => 'RMONDAN',
            'email'         => 'danny.montels@cycleurope.fr',
            'password'      => '$2y$10$uD0EkqLhGTv78sAmscjnluZw0rvE7iVIVE7dm/Q8bu/kKD8bVuWDq',
            'address1'      => '161, rue Gébriel Péri',
            'address2'      => '',
            'postalcode'    => '10104',
            'city'          => 'Romilly-sur-Seine',
            'role'          => 'sales',
        ]);
    }
}
