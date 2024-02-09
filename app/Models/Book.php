<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description','author_id', 'publisher_id', 'price', 'cover_image', /* outros campos */];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
    
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Método auxiliar para formatar o preço
    public function formattedPrice()
    {
        return number_format($this->price, 2, ',', '.');
    }

}
