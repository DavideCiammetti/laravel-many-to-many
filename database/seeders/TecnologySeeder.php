<?php

namespace Database\Seeders;

use App\Models\Tecnology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TecnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tecnologies = ['HTML', 'CSS', 'PHP', 'Laravel', 'Vue', 'Vite', 'Bootstrap','JavaScript'];

        foreach ($tecnologies as $tecnologiest) {

            $new_tecnology = new Tecnology();

            $new_tecnology->title = $tecnologiest;
            $new_tecnology->slug = Str::of($tecnologiest)->slug('-');

            $new_tecnology->save();
        }
    }
}
