<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Recipe;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        // Seed Categories table if empty
        if(User::count() <= 3){
            $this->call(UserTableSeeder::class);
        }

        // Seed Categories table if empty
        if(Category::count() == 0){
            $this->call(CategoriesTableSeeder::class);
        }

        // Seed Categories table if empty
        if(Recipe::count() <= 3){
            $this->call(RecipesTableSeeder::class);
        }
    }
}
