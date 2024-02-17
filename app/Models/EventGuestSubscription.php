<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventGuestSubscription extends Model
{
    use HasFactory;

    // Defina os campos que podem ser atribuídos em massa
    protected $fillable = [
        'event_id',
        'email',
        'confirmed'
    ];

    // Relação com o evento
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
