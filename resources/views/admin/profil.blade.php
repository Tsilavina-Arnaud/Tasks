<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('/header/task.jpg') }}" type="image/x-icon">
    <title>Tasks administration</title>
    @vite(['resources/css/style.css', 'resources/js/app.js'])
</head>

<body>
    <div>
        <div class="d-flex">
            <div class="w-13 h-100 position-fixed border-right-light-grey bg-small-grey d-none d-md-block">
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
                    <h4>Mon profil</h4>
                    <x-admin-header></x-admin-head>
                </div>
                <div class="container d-block margin-auto">
                    <div class="my-13">
                        <div class="d-lg-flex justify-content-center d-md-block align-items-stretch">
                            <div class="shadow">
                                <x-admin-profil class="admin-image-profil"></x-admin-profil>
                            </div>
                            <div class="bg-light px-4 shadow admin-update-form">
                                <form action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <x-input type="text" value="{{ $user->name }}" name="name"
                                        placeholder="admin" label="Administrateur"></x-input>
                                    <div class="mt-2">
                                        <x-input type="email" value="{{ $user->email }}" name="email"
                                            placeholder="admin@task.mg" label="Email"></x-input>
                                    </div>
                                    <div class="mt-2">
                                        <x-input type="file" name="image" placeholder="avatar"
                                            label="Avatar"></x-input>
                                    </div>
                                    <button class="btn btn-success w-100 mt-4">Modifier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
