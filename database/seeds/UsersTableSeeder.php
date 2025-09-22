<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([

            'name' => 'alasco',
            'email' => 'alasco@alasco.com',
            'password' => bcrypt('password')

        ]);
    }
}
