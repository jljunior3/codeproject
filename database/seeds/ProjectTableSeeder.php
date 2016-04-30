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
//    	\CodeProject\Entities\Client::truncate();
    	factory(\CodeProject\Entities\Project::class,100)->create();

    }
}
