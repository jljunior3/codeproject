<?php

use Illuminate\Database\Seeder;

class ProjectMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//    	\CodeProject\Entities\Client::truncate();
    	factory(\CodeProject\Entities\ProjectMember::class,50)->create();

    }
}
