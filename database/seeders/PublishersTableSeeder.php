<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Publisher;

class PublishersTableSeeder extends Seeder
{
    public function run()
    {
        Publisher::factory()->count(300)->create();
    }
}
