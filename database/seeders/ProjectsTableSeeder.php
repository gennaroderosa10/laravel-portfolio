<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        if (Type::count() === 0) {
            $this->command->warn('Nessun type presente nella tabella types.');
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project();

            $newProject->title = $faker->sentence();
            $newProject->author = $faker->name();
            $newProject->type_id = Type::inRandomOrder()->value('id');
            $newProject->content = $faker->paragraph(12);

            $newProject->save();
        }
    }
}
