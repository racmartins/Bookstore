<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->insert([
            ['name' => 'Autor 1'],
            ['name' => 'Autor 2'],
            ['name' => 'Autor 3'],
            ['name' => 'Autor 4'],
            ['name' => 'Autor 5'],
        ]);

    }
}

