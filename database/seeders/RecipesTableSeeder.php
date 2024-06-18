<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Recipe;
use Carbon\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // model factories
        // Recipe::factory(100)
        // ->has(Category::factory(3))
        // ->create();

        $recipes = Recipe::factory(100)->create();

        foreach ($recipes as $rec) {
            $cat = Category::query()->inRandomOrder()->take(3)->pluck('id');
            $rec->category()->attach($cat);
        }
    }
}
