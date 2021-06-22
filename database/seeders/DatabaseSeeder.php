<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        Article::factory()->count(10)->create();

        // admin
        $this->call([
            // seeding role and admin
            AdminTableSeeder::class,
        ]);

    }
}
