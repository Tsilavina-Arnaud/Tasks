<p class="lead tex-muted">
    Votre mot de passe s'il vous plaît?
</p>
<form method="post" action="{{ route('profile.destroy') }}" class="p-6">
    @csrf
    @method('delete')
    <div class="mt-6">
        <x-input-label for="password" value="Mot de passe"/>
        <x-text-input id="password" name="password" type="password" />
    </div>
    <div class="d-flex justify-content-between align-items-center my-2">
        <x-danger-button>
            Confirmez
        </x-danger-button>
    </div>
</form>
