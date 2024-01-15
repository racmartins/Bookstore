<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('books')->insert([
            ['title' => 'Livro 1', 'description' => 'Descrição do livro 1', 'author_id' => 1, 'publisher_id' => 1],
            ['title' => 'Livro 2', 'description' => 'Descrição do livro 2', 'author_id' => 2, 'publisher_id' => 2],
            // ... Repita para os demais livros
        ]);
    }
}
