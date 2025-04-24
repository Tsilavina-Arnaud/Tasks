<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('/header/task.jpg') }}" type="image/x-icon">
    <title>{{ $user->email }}</title>
    @vite(['resources/css/style.css', 'resources/js/jquery-3.6.1.js', 'resources/js/app.js'])
</head>

<body>
    <div>
        <div class="d-flex">
            <div class="w-13 position-fixed border-right-light-grey bg-small-grey">
                @include('admin.base')
            </div>
            <div class="w-100 ml-13">
                <div
                    class="d-flex shadow-sm justify-content-between px-3 align-items-center bg-light py-1 position-fixed top-0 w-87 index-3">
                    <h4><i class="bi bi-lock-fill text-primary"></i>{{ $user->email }}</h4>
                    <x-admin-header></x-admin-head>
                </div>
                <div class="mt-3 mx-3">
                    <p class="fw-bold">Plus d'information sur <span class="text-brown">{{ $user->name }}</span></p>
                </div>
                <div class="mx-3 mt-5">
                    <a href="{{ route('admin.userList') }}" class="decoration-none btn btn-primary mb-3">Voir tous</a>
                    <div class="d-lg-flex d-md-block justify-content-between">
                        <div class="w-30">
                            @if ($user->image)
                                <div class="p-2 bg-light w-330px">
                                    <img src="{{ $user->getUrl() }}" alt="" class="w-330px h-340px rounded">
                                </div>
                            @else
                                <div
                                    class="w-330px d-flex justify-content-center align-items-center h-340px rounded bg-brown">
                                    <span class="text-white fw-bold size-100px">
                                        {{ substr($user->name, 0, 1) }}
                                    </span>
                                </div>
                            @endif
                            <div class="shadow w-330px p-3 translateX-10 position-relative user-info">
                                <span class="fw-bold text-white px-3 bg-brown margin-b-0">{{ $user->name }}</span>
                                <p class="text-xs margin-b-0"><i class="bi bi-envelope"></i> {{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="w-50">
                            <p class="fw-bold"><i class="bi bi-card-checklist"></i> Progression des tâches</p>
                            <button type="button" class="btn btn-light">
                                @if ($total > 0)
                                    tâches
                                @else
                                    tâche
                                @endif
                                <span class="badge text-bg-secondary ">{{ $total }}</span>
                            </button>
                            <span class="text-light-grey"></span>
                            <div class="mt-3">
                                @forelse ($tasksUser as $tasks)
                                    <div class="my-3">
                                        <span class="text-muted">{{ $tasks->name }}</span>
                                        <div class="progress" style="height: 18px;" role="progressbar"
                                            aria-label="Basic example" aria-valuenow="75" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <div class="progress-bar @if ($tasks->name == 'En attente') bg-danger
                                                                    @elseif($tasks->name == 'En cours') bg-info
                                                                    @else bg-success @endif"
                                                style="width: {{ ($tasks->count * 100) / $total }}%">
                                                {{ number_format(($tasks->count * 100) / $total, 2) }}%</div>
                                        </div>
                                    </div>
                                    <strong class="text-light-grey">{{ $tasks->count }} tâches
                                        {{ strToLower($tasks->name) }}</strong>
                                @empty
                                    <div class="my-3">
                                        <span class="text-muted">Accompli</span>
                                        <div class="progress" role="progressbar" aria-label="Basic example"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: 0%">0</div>
                                        </div>
                                    </div>
                                    <div class="my-3">
                                        <span class="text-muted">En attente</span>
                                        <div class="progress" role="progressbar" aria-label="Basic example"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: 0%">0</div>
                                        </div>
                                    </div>
                                    <div class="my-3">
                                        <span class="text-muted">En cours</span>
                                        <div class="progress" role="progressbar" aria-label="Basic example"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: 0%">0</div>
                                        </div>
                                    </div>
                                    <div class="alert alert-warning">
                                        <p class="margin-b-0">
                                            <strong>{{ $user->name }}</strong>
                                            n' a aucune tâche en ce moment!
                                        </p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
