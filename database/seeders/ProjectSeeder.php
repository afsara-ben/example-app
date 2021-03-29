<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = Project::factory()
            ->count(20)
            ->make();
            
        foreach($projects as $project)
        {
            $project->save();
            $project->users()->attach(51);
            $project->users()->attach(rand(1, 50));
            $project->users()->attach(rand(1, 50));
            $project->users()->attach(rand(1, 50));
        }
    }
}
