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
        \ProjetoLaravel\Entities\Client::truncate();
        factory(\ProjetoLaravel\Entities\Client::class,10)->create();
    }
}
