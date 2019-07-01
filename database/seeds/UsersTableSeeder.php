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
        factory(App\User::class,19)->create();
        App\User::create([
            'name' => 'Alex Aragón Calixto',
            'email' => 'aragcar@gmail.com',
            'password' => bcrypt('smnews'),
            'remember_token' => str_random(10)
        ]);
    }
}
