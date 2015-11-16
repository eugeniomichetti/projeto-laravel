<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \ProjetoLaravel\Client::truncate();
        factory(\ProjetoLaravel\Client::class,10)->create();
    }
}
