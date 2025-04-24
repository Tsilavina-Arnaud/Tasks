<x-guest-layout>
    <div class="text-md">
        Merci pour votre inscription! Avant de commencer, pourriez-vous vérifier votre adresse email et cliquez sur le
        lien pour confirmez que c'est vraiment vous. Si vous n'avez reçu cet email, veuillez-vous cliquez sur ce lien ci-dessous.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="text-xs text-success">
            Un nouveau email est envoyé à votre compte email
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    Réenvoyer l'email
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
