<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('/header/task.jpg') }}" type="image/x-icon">
    <title>Tasks administration</title>
    @vite(['resources/css/style.css', 'resources/js/jquery-3.6.1.js', 'resources/js/app.js'])
</head>

<body>
    <div>
        <div class="d-flex">
            <div class="w-13 position-fixed h-100 border-right-light-grey bg-small-grey d-none d-md-block">
                @include('admin.base')
            </div>
            <div class="w-100 ml-13 main-admin-responsive">
                <div
                    class="d-flex shadow-sm justify-content-between px-3 align-items-center bg-light py-1 position-fixed top-0 w-87 index-3 fixed-header-admin">
                    <a class="d-xs-block d-sm-block d-md-none d-lg-none" data-bs-toggle="offcanvas"
                        href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                        <img src="{{ asset('/images/burger.png') }}" alt="" class="w-h-25px border">
                    </a>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                        aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="">
                                <div class="d-flex justify-content-center mt-4">
                                    <div class="w-100">
                                        <img src="{{ asset('/header/task.jpg') }}" alt=""
                                            class="w-45 d-block margin-auto rounded-pill select-none">
                                        <p class="text-light-brown text-center fw-bold">Tasks</p>
                                    </div>
                                </div>
                                @php
                                    $routeName = request()->route()->getName();
                                @endphp
                                <div class="mt-5">
                                    <div class="mx-4 my-4">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('admin.profil') }}" @class([
                                                'admin-menu w-90px p-2 rounded-sm decoration-none',
                                                'active-admin-menu' => str_contains($routeName, 'admin.profil'),
                                            ])>
                                                <div class="d-flex justify-content-center">
                                                    <i class="bi bi-person-bounding-box text-light-grey"></i>
                                                </div>
                                                <p class="margin-b-0 text-light-grey text-center">Profil</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mx-4 my-5">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('admin.userList') }}" @class([
                                                'admin-menu w-90px p-2 rounded-sm decoration-none',
                                                'active-admin-menu' => str_contains($routeName, 'admin.userList'),
                                            ])>
                                                <div class="d-flex justify-content-center">
                                                    <i class="bi bi-people-fill text-light-grey"></i>
                                                </div>
                                                <p class="margin-b-0 text-light-grey text-center">Utilisateurs</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mx-3 my-5">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('admin.tasks') }}" @class([
                                                'admin-menu w-90px p-2 rounded-sm decoration-none',
                                                'active-admin-menu' => str_contains($routeName, 'admin.tasks'),
                                            ])>
                                                <div class="d-flex justify-content-center">
                                                    <i class="bi bi-people-fill text-light-grey"></i>
                                                </div>
                                                <p class="margin-b-0 text-light-grey text-center">Tâches</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mx-3 my-5">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('admin.notifications') }}" @class([
                                                'admin-menu w-90px p-2 rounded-sm decoration-none',
                                                'active-admin-menu' => str_contains($routeName, 'admin.notifications'),
                                            ])>
                                                <div class="d-flex justify-content-center">
                                                    <i class="bi bi-bell-fill text-light-grey"></i>
                                                </div>
                                                <p class="margin-b-0 text-light-grey text-center">Messages</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <h4></h4>
                    <x-admin-header></x-admin-head>
                </div>
                <div class="mt-6 container-fluid">
                    <div class="d-lg-flex">
                        <div class="shadow w-22 py-2 px-4 linear-brown rounded-sm my-3 card-responsive-100">
                            <h5 class="text-center text-white"><span
                                    class="text-primary fw-bold">{{ $usersCount->count() }}</span> utilisateurs</h5>
                            <p class="text-md text-white margin-b-0 text-center">au total</p>
                            <div class="d-flex justify-content-center align-items-center pt-2">
                                @foreach ($usersAvatar as $client)
                                    @if ($client->image)
                                        <a
                                            href="{{ route('admin.userList.show', ['email' => $client->email, 'user' => $client->id]) }}">
                                            <img src="{{ $client->getUrl() }}" alt=""
                                                class="w-h-25px rounded-circle border-white -ml-5 select-none">
                                        </a>
                                    @else
                                        <a
                                            href="{{ route('admin.userList.show', ['email' => $client->email, 'user' => $client->id]) }}">
                                            <img src="{{ asset('/images/avatar.png') }}" alt=""
                                                class="w-h-25px rounded-circle border-white -ml-5 select-none">
                                        </a>
                                    @endif
                                @endforeach
                                @if ($usersCount->count() > 9)
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span
                                            class="select-none bg-light-grey text-center w-h-25px rounded-circle text-white fw-bold">
                                            +
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div
                            class="linear-brown rounded-sm w-22 mx-5-not-important my-3 px-4 py-2 shadow d-flex justify-content-center align-items-center card-responsive-100 ml-0-res">
                            <h5 class="text-white text-center">
                                <span class="text-primary text-md fw-bold">{{ $usersMonthN->count() }}</span>
                                nouvels utilisateurs pour <br> le mois de <span
                                    class="text-grey fw-bold">{{ now()->isoFormat('MMMM') }}</span>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-4">
                    <table id="users-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>#id</th>
                                <th>Profil</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Créer</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="align-middle">
                                    <td class="align-middle py-20">
                                        <a href="{{ route('admin.userList.show', ['email' => $user->email, 'user' => $user->id]) }}"
                                            class="decoration-none text-brown">#{{ $user->id }}</a>
                                    </td>
                                    <td class="select-none">
                                        @if ($user->image)
                                            <img src="{{ $user->getUrl() }}" alt=""
                                                class="w-h-40 rounded-circle">
                                        @else
                                            <div class="user-none-profil">
                                                <span class="text-white fw-bold">
                                                    {{ substr($user->name, 0, 1) }}
                                                </span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="align-middle">{{ $user->name }}</td>
                                    <td class="align-middle">{{ $user->email }}</td>
                                    <td class="align-middle">
                                        <span class="badge bg-primary">
                                            {{ $user->created_at->diffForHumans() }}
                                        </span>
                                    </td>
                                    <td class="text-success fw-bold">{{ $user->created_at }}</td>
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-end">
                                            <a class="text-md"
                                                href="{{ route('admin.userList.show', ['email' => $user->email, 'user' => $user->id]) }}"><i
                                                    class="bi bi-eye-fill text-warning"></i></a>
                                            <form
                                                action="{{ route('admin.userList.destroy', ['user' => $user->id]) }}"
                                                method="post" class="deleteUser">
                                                @csrf
                                                @method('delete')
                                                <button class="border-0 bg-none" type="submit"><i
                                                        class="bi bi-trash-fill text-danger mx-3"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
