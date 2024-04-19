<?php

use App\User;
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
        User::create([
            'name' => 'WebMais Sistemas',
            'email' => 'webmais@gmail.com',
            'password' => 'senha123',
        ]);
    }
}
