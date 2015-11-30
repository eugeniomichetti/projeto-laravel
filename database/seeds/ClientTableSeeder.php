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
        \ProjetoLaravel\Models\Client::truncate();
        factory(\ProjetoLaravel\Models\Client::class,10)->create();
    }
}
