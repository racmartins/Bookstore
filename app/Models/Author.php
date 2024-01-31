<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'birth_year'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    // Método auxiliar para calcular a idade do autor
    public function age()
    {
        return date('Y') - $this->birth_year;
    }
}
