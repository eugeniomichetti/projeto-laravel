<?php

use Illuminate\Database\Seeder;

class ProjectNoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\ProjetoLaravel\Entities\Project::truncate();
        factory(\ProjetoLaravel\Entities\ProjectNote::class,50)->create();
    }
}
