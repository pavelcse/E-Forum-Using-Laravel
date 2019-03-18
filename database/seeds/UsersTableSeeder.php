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
            'name'      => 'admin',
            'password'  => bcrypt('admin'),
            'email'     => 'admin@example.com',
            'avatar'    => 'avatars/avatar.png',
            'admin'     => 1
        ]);

        App\User::create([
            'name'      => 'Pavel Parvej',
            'password'  => bcrypt('password'),
            'email'     => 'pavel@example.com',
            'avatar'    => 'avatars/avatar1.png'
        ]);

        App\User::create([
            'name'      => 'Parvez Pavel',
            'password'  => bcrypt('password'),
            'email'     => 'parvez@example.com',
            'avatar'    => 'avatars/avatar.png'
        ]);
    }
}
