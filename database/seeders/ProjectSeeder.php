<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(Faker $faker): void
    {

        Schema::disableForeignKeyConstraints();

        // Truncate the projects table
        Project::truncate();

        // Truncate the pivot table project_technology
        DB::table('project_technology')->truncate();

        // Re-enable foreign key checks
        Schema::enableForeignKeyConstraints();

        for ($i = 0; $i < 50; $i++) {

            $project = new project();
            $project->title = $faker->sentence(2);
            $project->description = $faker->text(500);
            $project->slug =  Str::of($project->title)->slug('-');
            $project->staff = $faker->name(1);
            $project->img = $faker->sentence(1);
            $project->save();
        }
    }
}
