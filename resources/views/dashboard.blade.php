@php
    $day = now()->isoFormat('dddd');
    $dayN = now()->isoFormat('DD');
    $monthN = now()->isoFormat('MMMM');
    $year = now()->isoFormat('YYYY');

    $months = [
        'janvier',
        'février',
        'mars',
        'avril',
        'mai',
        'juin',
        'juillet',
        'août',
        'septembre',
        'octobre',
        'novembre',
        'décembre',
    ];
@endphp


@extends('layouts.navigation')

@section('title', 'Tableau de bord')

@section('content')
    <div class="d-flex align-items-center index-10">
        <!-- Customer profil  -->
        <div class="position-fixed bg-light-grey w-79 top-0 ml-5px py-2 z-3">
            <div class="d-flex justify-content-between align-items-center px-4">
                <p></p>
                <div class="d-flex align-items-center resp-customer-header">
                    <span class="position-relative w-h-40 rounded-circle bell-users translateX110neg">
                        <i class="bi bi-bell text-white text-md"></i>
                        @if ($notificationsCount > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $notificationsCount }}
                                <span class="visually-hidden"></span>
                            </span>
                        @endif
                    </span>
                    <div class="dropdown">
                        <a class="dropdown-toggle text-white decoration-none" href="{{ route('profile.edit') }}"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <x-admin-profil class="w-h-40 rounded-circle border"></x-admin-profil>
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a></li>
                            <li><a class="dropdown-item" href="{{ route('task.index') }}">Tâches</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Customer profil  -->
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
    <div class="container mt-6 py-2 px-3">
        <div class="d-flex justify-content-around align-items-center">
            <form action="{{ route('customer.dashboard') }}" method="post">
                @csrf
                <select name="month" id="month" class="form-select box-shadow-none bg-none">
                    @foreach ($months as $month)
                        <option value="{{ $month }}" @selected($monthActive == $month)>{{ $month }}</option>
                    @endforeach
                </select>
                <button type="submit" class="d-none" id="submitSelect">Rechercher</button>
            </form>
            <p class="margin-b-0">
                <span class="fw-bold text-light-brown capitalize">{{ $day }}, </span>
                <span>{{ $dayN }} {{ $monthN }} {{ $year }}</span>
            </p>
        </div>
        <button class="border-0 burger-m-customer my-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
            <img src="{{ asset('/images/burger.png') }}" alt="" class="w-h-25px">
        </button>
        <hr>
        <div class="my-3">
            <div class="d-lg-flex justify-content-center">
                @forelse ($tasksCircles as $taskscircle)
                    <x-progress :taskscircle=$taskscircle :taskstotal=$tasksTotal></x-progress>
                @empty
                    <div class="alert alert-info">
                        Désolé! Vous n'avez pas encore de tâche pour le mois de <strong>{{ $monthActive }}</strong>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="my-3">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 position-relative">
                    <h5 class="my-1 fw-bold text-light-brown">Les tâches accomplis</h5>
                    <select name="yearSelected" class="form-select box-shadow-none bg-none" id="yearSelected">
                        @for ($i = 2010; $i <= 2050; $i++)
                            <option value="{{ $i }}" @selected($year == $i)>{{ $i }}
                            </option>
                        @endfor
                    </select>
                    <div id="canvas">
                        <canvas id="taskAccomplished"></canvas>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ml-8">
                    <h5 class="fw-bold text-left text-light-brown">Toutes les tâches</h5>
                    <div class="h-360px">
                        @forelse ($tasksInProgress as $task)
                            <div
                                class="shadow-sm my-3 p-3 @if ($task->name === 'Accompli') border-left-success
                                                                    @elseif($task->name === 'En attente') border-left-danger
                                                                    @else border-left-info @endif">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="rounded-pill py-1 px-3 @if ($task->name === 'Accompli') bg-success
                                                                    @elseif($task->name === 'En attente') bg-danger
                                                                    @else bg-info @endif">
                                        <span class="text-sm text-white">{{ $task->month }}</span>
                                    </div>
                                    <div class="text-sm mx-2">
                                        <span class="text-black">{{ substr($task->title, 0, 20) }}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="margin-b-0">Vous n'avez pas de tâche en ce moment!</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
