<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\ProjetoLaravel\Entities\User::truncate();
        factory(\ProjetoLaravel\Entities\User::class)->create([
            'name' => 'Eugênio Michetti',
            'email' => 'eugeniomichetti1@gmail.com',
            'password' => bcrypt(33920867),
            'remember_token' => str_random(10),
        ]);
        factory(\ProjetoLaravel\Entities\User::class,10)->create();
    }
}
