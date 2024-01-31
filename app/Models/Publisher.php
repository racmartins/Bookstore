<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'foundation_year'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    // Método auxiliar para obter a duração desde a fundação
    public function yearsSinceFoundation()
    {
        return date('Y') - $this->foundation_year;
    }

}
