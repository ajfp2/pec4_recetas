<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Alfonso J. Ferrando Puigcerver',
            'email' => 'ajfp2@uoc.edu',
            'password' => bcrypt('12341234')
        ]);
    }
}
