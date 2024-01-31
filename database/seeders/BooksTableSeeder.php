<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        Book::factory()->count(400)->create();
    }
}
