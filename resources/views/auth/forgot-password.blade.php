<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Esqueceu a sua senha? Sem problema. Apenas nos dê a conhecer o seu endereço de email e faremos um email com o link de reset que lhe permitirá escolher uma nova senha.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Link de Reset da Senha') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
