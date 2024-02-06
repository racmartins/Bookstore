<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Correção aqui


class Publisher extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

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
