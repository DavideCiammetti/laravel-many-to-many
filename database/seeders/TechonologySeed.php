<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechonologySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['HTML', 'CSS', 'PHP', 'Laravel', 'Vue', 'Vite', 'Bootstrap','JavaScript'];

        foreach ($technologies as $technologiest) {

            $new_technology = new Technology();

            $new_technology->title = $technologiest;
            $new_technology->slug = Str::of($technologiest)->slug('-');

            $new_technology->save();
        }
    }
}
