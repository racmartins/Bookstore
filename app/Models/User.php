<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    //relação com eventos sobrescritos
    public function subscribedEvents()
    {
        return $this->belongsToMany(Event::class, 'event_user', 'user_id', 'event_id');
    }
    //relação que constata que o utilizador está sobrescrito ao evento
    public function isSubscribedToEvent(Event $event)
    {
        return $this->subscribedEvents()->where('event_id', $event->id)->exists();
    }
    //método que diferencia o admin dos restantes utilizadores
    public function isAdmin()
    {
        // Supondo que 'role' é uma coluna na sua tabela de utilizadores
        // e que 'admin' é o valor que indica um utilizador administrador.
        // Adapte esta lógica conforme a estrutura e necessidade da sua aplicação.
        return $this->role === 'admin';
    }

}
