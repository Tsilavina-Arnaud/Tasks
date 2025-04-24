<x-guest-layout>
    <div class="py-100 px-5">
        <div class="mb-4 text-sm text-gray-600">
            <p class="text-md">
                Vous avez oublié votre mot de passe? Ce n'est pas un problème. Vous pouvez le récupérer en utilisons
                votre adresse email.
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Récupérer maintenant') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
