<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tasks') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/style.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    @php
        $routeName = request()->route()->getName();
    @endphp
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}">
                <img src="{{ asset('header/task.jpg') }}" alt="task-logo" class="logo">
                <p class="margin-b-0 d-inline mt-3 text-light-grey">Tasks</p>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mx-3" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a @class([
                            'nav-link',
                            'text-md',
                            'text-brown active-link' => str_contains($routeName, 'welcome'),
                        ]) aria-current="page" href="{{ route('welcome') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a @class([
                            'nav-link',
                            'text-md',
                            'text-brown active-link' => str_contains($routeName, 'service'),
                        ]) href="{{ route('service') }}">Service</a>
                    </li>
                    <li class="nav-item">
                        <a @class([
                            'nav-link',
                            'text-md',
                            'text-brown active-link' => str_contains($routeName, 'contact'),
                        ]) href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
                @guest
                    <ul class="navbar-nav transformX-240">
                        <li class="nav-item mt-1">
                            <a href="{{ route('register') }}"
                                class="nav-link text-sm inscription nav-link-p-0 rounded py-1 px-2">S'inscrire</a>
                        </li>
                        <span class="separateur mt-2 mx-2">|</span>
                        <li class="nav-item mt-1">
                            <a href="{{ route('login') }}"
                                class="nav-link text-sm connexion nav-link-p-0 rounded py-1 px-2">Se connecter</a>
                        </li>
                    </ul>
                @endguest
                @auth
                    @if (Auth::user()->role === 'admin')
                        <ul class="navbar-nav transformX-630">
                            <li class="nav-item mt-1">
                                <a href="{{ route('admin.dashboard') }}"
                                    class="nav-link text-sm connexion nav-link-p-0 rounded py-1 px-2">Dashboard</a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav transformX-630">
                            <li class="nav-item mt-1">
                                <a href="{{ route('customer.dashboard') }}"
                                    class="nav-link text-sm connexion nav-link-p-0 rounded py-1 px-2">Mes tâches</a>
                            </li>
                        </ul>
                    @endif
                @endauth
            </div>
        </div>
    </nav>
    <div class="transition-fade" id="swup">
        <div class="container w-100 my-13">
            <div class="w-100 d-lg-flex shadow">
                <div class="w-demi">
                    {{ $slot }}
                </div>
                <div class="w-demi bg-light d-flex justify-content-center align-items-center">
                    <img src="{{ asset('/images/many-tasks.jpg') }}" alt="" class="w-100">
                </div>
            </div>
        </div>
        <div class="bg-black">
            <div class="container">
                @include('shared.footer')
            </div>
        </div>
    </div>
</body>

</html>
