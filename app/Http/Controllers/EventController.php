<?php

namespace App\Http\Controllers;

use App\Mail\EventSubscriptionConfirmation;
use Illuminate\Support\Facades\Mail;

use App\Models\Event;
use App\Models\EventGuestSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    // Listar eventos
    public function index()
    {
        $events = Event::paginate(10); // Isto listará todos os eventos sem distinção

        return view('events.index', compact('events'));
    }

    // Criar evento
    public function create()
    {
        return view('events.create');
    }

    // Armazenar evento
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'location' => 'required|string|max:255',
        ]);
        
        // Definindo se é um evento do sistema baseado no papel do utilizador
        $isSystemEvent = Auth::user()->isAdmin(); // Certifique-se de que isAdmin() está corretamente implementado no modelo User

        // Criar o evento com os dados validados e adicionais
        $event = Event::create($validated + [
            'user_id' => Auth::id(), // Define o criador do evento
            'is_system_event' => $isSystemEvent, // Define se é um evento do sistema
        ]);

        // Autoinscrever o criador do evento
        $event->subscribers()->attach(Auth::id(), ['created_at' => now(), 'updated_at' => now()]);

        return redirect()->route('events.index')->with('success', 'Evento criado com sucesso e você foi inscrito nele.');

    }
    
    // Mostrar evento
    public function show($id)
    {
        $event = Event::with('subscribers')->findOrFail($id);

        // Utilizadores Autenticados
        $subscribedUsers = $event->subscribers->map(function ($user) {
            return [
                'name' => $user->name,
                'email' => $user->email, // Opcional, para uniformidade
                'type' => 'auth',
                'subscription_time' => $user->pivot->created_at
            ];
        });

        // Utilizadores Não autenticados
        $guestSubscriptions = EventGuestSubscription::where('event_id', $event->id)->get()->map(function ($subscription) {
            return [
                'name' => null, // Não aplicável
                'email' => $subscription->email,
                'type' => 'guest',
                'subscription_time' => $subscription->created_at
            ];
        });

        // Combinar as listas (autenticados e convidados)
        $allSubscriptions = $subscribedUsers->merge($guestSubscriptions)->sortBy('subscription_time');

        return view('events.show', compact('event', 'allSubscriptions'));
    }

    // Editar evento
    public function edit(Event $event)
    {
        $this->authorize('update', $event);
        return view('events.edit', compact('event'));
    }

    // Atualizar evento
    public function update(Request $request, Event $event)
    {
        $this->authorize('update', $event);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'location' => 'required|string|max:255',
        ]);

        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'Evento atualizado com sucesso.');
    }

    // Remover evento
    public function destroy(Event $event)
    {
        $this->authorize('delete', $event);
        $event->delete();

        return redirect()->route('events.index');
    }

    // Efetuar inscrição num evento e automatizar processo de envio de email
    public function subscribe(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);
        $emailToSend = '';
    
        if (Auth::check()) {
            // Utilizador autenticado
            $alreadySubscribed = $event->subscribers()->where('user_id', Auth::id())->exists();
    
            if (!$alreadySubscribed) {
                $event->subscribers()->attach(Auth::id());
                $emailToSend = Auth::user()->email; // Definindo o e-mail do usuário autenticado para enviar a confirmação
                $message = 'Já foi inscrito no evento com sucesso.';
            } else {
                return back()->with('error', 'Já está inscrito neste evento.');
            }
        } else {
            // Utilizador não autenticado (guest)
            $email = $request->input('email');
            $request->validate(['email' => 'required|email']);
            $existingSubscription = EventGuestSubscription::where('event_id', $eventId)->where('email', $email)->first();
    
            if ($existingSubscription) {
                return back()->with('error', 'Este email já se encontra inscrito neste evento.');
            }
            EventGuestSubscription::create([
                'event_id' => $eventId,
                'email' => $email,
                'confirmed' => false // Este campo pode ser utilizado posteriormente para verificar a confirmação do e-mail
            ]);
            $emailToSend = $email; // Definindo o e-mail do guest para enviar a confirmação
            $message = 'A sua inscrição foi recebida. Por favor aguarde a sua confirmação por email.';
        }
        // Envio do e-mail de confirmação
        if (!empty($emailToSend)) {
            Mail::to($emailToSend)->send(new EventSubscriptionConfirmation($event, $emailToSend));
        }
        return back()->with('success', $message);
    }
    // Eventos lançados pelo admin (sistema) e visiveis na área pública
    public function publicEvents()
    {
        $systemEvents = Event::where('is_system_event', true)->get(); // Ou use paginate() para paginação
        return view('eventos', compact('systemEvents'));
    }
    // Mostra Form de inscrição no evento
    public function showInscriptionForm($id)
    {
        $event = Event::findOrFail($id);
        // Certifique-se de verificar se se trata de um evento do sistema ou de aplicar lógica adicional conforme se torne necessário
        return view('inscription', compact('event'));
    }
}