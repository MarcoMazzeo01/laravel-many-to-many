<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labels = ['HTML', 'CSS', 'Javascript', 'SQL', 'PHP', 'Blade'];

        foreach ($labels as $label) {
            $tech = new Technology();
            $tech->label = $label;
            $tech->save();
        }
    }
}
