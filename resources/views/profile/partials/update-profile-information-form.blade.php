<section>
    <button class="border-0 burger-m-customer mb-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
        <img src="{{ asset('/images/burger.png') }}" alt="" class="w-h-25px">
    </button>
    <div class="d-flex justify-content-center">
        <x-admin-profil class="w-h-330 rounded-sm border-secondary"></x-admin-profil>
    </div>
    <div class="offcanvas offcanvas-start" id="demo">
        <div class="offcanvas-header">
            <h1 class="offcanvas-title text-light-grey">Tasks</h1>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <div class="d-flex align-items-center">
                <div class="w-100">
                    <a class="decoration-none my-3 py-2 text-white px-3 rounded hover-opacity-8 d-block w-100 bg-light-grey"
                        href="{{ route('customer.dashboard') }}">Tableau de bord</a>
                    <a class="decoration-none my-3 py-2 text-white px-3 rounded hover-opacity-8 d-block w-100 bg-light-grey"
                        href="{{ route('profile.edit') }}">Mon profil</a>
                    <a class="decoration-none my-3 py-2 text-white px-3 rounded hover-opacity-8 d-block w-100 bg-light-grey"
                        href="{{ route('task.index') }}">Mes tâches</a>
                    <a class="decoration-none my-3 py-2 text-white px-3 rounded hover-opacity-8 d-block w-100 bg-light-grey"
                        href="{{ route('user.notifications') }}">Notifications</a>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" enctype="multipart/form-data" action="{{ route('profile.update') }}" class="mt-4">
            @csrf
            @method('patch')
            <div>
                <x-input-label for="name" :value="__('Nom')" />
                <x-text-input id="name" name="name" type="text" :value="old('name', $user->name)" required autofocus
                    autocomplete="name" class="bg-none border-brown" />
                <x-input-error :messages="$errors->get('name')" />
            </div>

            <div class="mt-3">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" :value="old('email', $user->email)" required
                    autocomplete="username" class="bg-none border-brown" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
            <div class="form-group mt-3">
                <label for="image" class="text-light-grey">Avatar</label>
                <input type="file" name="image" id="image" class="form-control box-shadow-none w-100">
            </div>
            <div class="d-flex justify-content-between align-items-center mt-2">
                <x-primary-button class="w-100">Modifier</x-primary-button>

                @if (session('status') === 'profile-updated')
                    <div class="alert alert-success" x-data="{ show: true }" x-show="show" x-transition
                        x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">Votre compte est bien modifié!</div>
                @endif
            </div>
        </form>
    </div>
</section>
