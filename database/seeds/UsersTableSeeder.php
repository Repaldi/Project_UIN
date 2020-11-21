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
        \App\User::create([
            'username'  => 'admin',
            'email' =>  'admin@gmail.com',
            'role' => 0,
            'password'  => bcrypt('admin')
    ]);
    }
}
