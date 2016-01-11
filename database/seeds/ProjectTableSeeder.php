<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\ProjetoLaravel\Entities\Project::truncate();
        factory(\ProjetoLaravel\Entities\Project::class,10)->create();
    }
}
