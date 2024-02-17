<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Definir os campos que podem ser preenchidos
    protected $fillable = [
        'title',
        'description',
        'start_time',
        'end_time',
        'location',
        'user_id',
        'is_system_event',
    ];

    protected $dates = ['start_time', 'end_time'];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    // Se tiver relações, como eventos pertencendo a um utilizador ou categorias, defina-as aqui
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //Método que relaciona eventos com os sobrescritores
    public function subscribers() 
    {
        return $this->belongsToMany(User::class, 'event_user', 'event_id', 'user_id')
                ->withTimestamps(); // Isto vai permitir que use os campos created_at e updated_at
    }
    // Método para verificar se é um evento do sistema
    public function isSystemEvent()
    {
        return $this->is_system_event;
    }
    //Método que relaciona o evento com a subscrição pública
    public function guestSubscriptions()
    {
        return $this->hasMany(EventGuestSubscription::class);
    }
    /**
     * Método para formatar a data e hora de início do evento.
     */
    public function getFormattedStartTimeAttribute()
    {
        return $this->start_time->format('d/m/Y H:i');
    }
    /**
     * Método para formatar a data e hora de fim do evento.
     */
    public function getFormattedEndTimeAttribute()
    {
        return $this->end_time->format('d/m/Y H:i');
    }
}