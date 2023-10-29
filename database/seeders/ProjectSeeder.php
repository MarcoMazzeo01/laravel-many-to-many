<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

use App\Models\Project;
use App\Models\Type;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = Type::all()->pluck('id')->toArray();
        $types[] = null; //imposta l'ultima key dell'array come null

        for ($i = 0; $i < 50; $i++) {
            $type_id = $faker->randomElement($types);

            $project = new Project();
            $project->type_id = $type_id;

            $project->title = $faker->catchPhrase();
            $project->description = $faker->paragraph(2, true);
            $project->slug = Str::slug($project->title);
            $project->save();
        }
    }
}
