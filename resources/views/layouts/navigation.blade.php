<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/style.css', 'resources/js/jquery-3.6.1.js', 'resources/js/script.js', 'resources/js/tasks.js'])
</head>

<body class="bg-light">
    @php
        $routeName = request()->route()->getName();
    @endphp
    <div class="container-fluid">
        <div class="customer-flex-menu">
            <div class="bg-white w-20 px-2 py-4 rounded shadow position-fixed burger-menu-customer">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-md fw-bold border-sm-bottom">Tasks</span>
                    <div class="d-flex justify-content-center align-items-center w-h-40 bg-light">
                        <a href="{{ route('welcome') }}" title="Retour à la page d'accueil">
                            <i class="bi bi-house-door-fill"></i>
                        </a>
                    </div>
                </div>
                <div class="my-3 d-flex justify-content-center">
                    <div>
                        @if ($actif_user->image)
                            <img src="{{ $actif_user->getUrl() }}" alt="user-profil"
                                class="w-70px d-block m-auto border rounded-pill select-none">
                        @else
                            <img src="{{ asset('/images/images.png') }}" alt="user-profil"
                                class="w-70px d-block m-auto border rounded-pill select-none">
                        @endif
                        <span class="text-muted d-block text-center my-2"><i class="bi bi-person-fill-lock"></i>
                            {{ Auth::user()->email }}</span>
                    </div>
                </div>
                <p class="margin-b-0 text-light-grey">Tâches et profil</p>
                <div class="mt-2 ml-10">
                    <a href="{{ route('customer.dashboard') }}" @class([
                        'rounded decoration-none py-2 px-2 w-100 d-block customer-nav-link',
                        'active-customer-nav-link' => str_contains(
                            $routeName,
                            'customer.dashboard'),
                    ])>
                        <span class="px-3 text-brown"><i class="bi bi-bar-chart-fill"></i> Tableau de bord</span>
                    </a>
                    <a href="{{ route('profile.edit') }}" @class([
                        'rounded decoration-none my-2 py-2 px-2 w-100 d-block customer-nav-link',
                        'active-customer-nav-link' => str_contains($routeName, 'profile.edit'),
                    ])>
                        <span class="px-3 text-brown"><i class="bi bi-person-fill"></i> Mon profil</span>
                    </a>
                    <a href="{{ route('task.index') }}" @class([
                        'rounded decoration-none py-2 px-2 w-100 d-block customer-nav-link',
                        'active-customer-nav-link' => str_contains($routeName, 'task.index'),
                    ])>
                        <span class="px-3 text-brown"><i class="bi bi-list-task"></i> Mes tâches</span>
                    </a>
                    <a href="{{ route('user.notifications') }}" @class([
                        'rounded decoration-none py-2 px-2 my-2 w-100 d-block customer-nav-link',
                        'active-customer-nav-link' => str_contains(
                            $routeName,
                            'user.notifications'),
                    ])>
                        <span class="px-3 text-brown"><i class="bi bi-bell-fill"></i> Notifications @if ($unreadNotifications > 0)
                                <span class="badge bg-danger">{{ $unreadNotifications }}</span>
                            @endif
                        </span>
                    </a>
                </div>
                <p class="margin-b-0 text-light-grey mt-3">Liste des observations</p>
                <ul class="list-group list-group-flush">
                    @foreach ($observations as $observation)
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <span
                                    class="w-15px
                                 @if ($observation->name == 'Accompli') bg-success @endif
                                 @if ($observation->name == 'En attente') bg-danger @endif
                                 @if ($observation->name == 'En cours') bg-info @endif
                                  d-block"></span>
                                <span class="mx-2">{{ $observation->name }}</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-4 ml-10">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button
                            class="rounded text-left border-0 decoration-none mt-2 py-2 px-4 w-100 d-block customer-nav-link"
                            type="submit"><i class="bi bi-box-arrow-right"></i> Se déconnecter</button>
                    </form>
                </div>
            </div>
            <div class="w-100 ml-20">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
