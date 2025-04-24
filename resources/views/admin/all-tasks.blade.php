<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('/header/task.jpg') }}" type="image/x-icon">
    <title>Tasks administration</title>
    @vite(['resources/css/style.css', 'resources/js/jquery-3.6.1.js', 'resources/js/adm-tasks.js'])
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
                    <h4>Tâches</h4>
                    <x-admin-header></x-admin-head>
                </div>
                <div class="mt-6 d-block margin-auto container">
                    <div class="d-lg-flex align-items-center">
                        <h3 class="border-left-pink px-1 py-2 margin-b-0 rounded w-50">Les tâches</h3>
                        <div class="d-lg-flex w-100">
                            <div class="w-30 shadow py-3 rounded-sm card-count-tasks">
                                <div class="text-center text-white">
                                    <h3 class="fw-bold">{{ $countAccomplished }}</h3>
                                    <p class="text-sm margin-b-0">Tâches accomplies</p>
                                </div>
                            </div>
                            <div class="w-30 shadow mlr-4 py-3 rounded-sm card-count-tasks">
                                <div class="text-center text-white">
                                    <h3 class="fw-bold">{{ $countInProgress }}</h3>
                                    <p class="text-sm margin-b-0">Tâches en cours</p>
                                </div>
                            </div>
                            <div class="w-30 shadow py-3 rounded-sm card-count-tasks">
                                <div class="text-center text-white">
                                    <h3 class="fw-bold">{{ $countStandBy }}</h3>
                                    <p class="text-sm margin-b-0">Tâches en attente</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 px-1">
                        <button id="defaultStatus"
                            class="bg-none px-3 text-light-brown fw-bold task-status">Accomplies</button>
                        <button class="bg-none px-3 text-light-brown fw-bold mx-5 task-status">
                            En cours</button>
                        <button class="bg-none px-3 text-light-brown fw-bold mx-5 task-status">
                            En attente</button>
                    </div>
                    <div class="task-content" id="Accomplies">
                        <x-accomplished-tasks></x-accomplished-tasks>
                    </div>
                    <div class="task-content" id="Encours">
                        <x-in-progress-tasks></x-in-progress-tas>
                    </div>
                    <div class="task-content" id="Enattente">
                        <x-stand-by-tasks></x-stand-by-tasks>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
