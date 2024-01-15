<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublishersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('publishers')->insert([
            ['name' => 'Editora 1'],
            ['name' => 'Editora 2'],
            ['name' => 'Editora 3'],
            ['name' => 'Editora 4'],
            ['name' => 'Editora 5'],
        ]);
    }
}
