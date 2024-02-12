<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(Faker $faker): void
    {

        Project::truncate();

        for ($i = 0; $i < 50; $i++) {

            $type_id = Type::inRandomOrder()->first();
            $project = new project();
            $project->title = $faker->sentence(2);
            $project->description = $faker->text(500);
            $project->slug =  Str::of($project->title)->slug('-');
            $project->staff = $faker->name(1);
            $project->img = $faker->sentence(1);
            $project->type_id =  $type_id->id;
            $project->save();
        }
    }
}
