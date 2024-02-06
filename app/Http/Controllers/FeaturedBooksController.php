<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class FeaturedBooksController extends Controller
{
    public function featuredBooks()
    {
        $featuredBooks = Book::featured()->get();

        return view('featured-books', compact('featuredBooks'));
    }
}
