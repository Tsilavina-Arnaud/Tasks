@extends('layouts.navigation')

@section('title', 'Mes tâches')

@section('content')
    <!-- Customer profil  -->
    <div class="bg-light-grey position-fixed w-79 top-0 ml-5px py-2 z-3">
        <div class="d-flex justify-content-between align-items-center px-4">
            <p class="text-lg margin-b-0 text-white"></p>
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
                    <a class="dropdown-toggle text-white decoration-none" href="{{ route('profile.edit') }}" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
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
    <div class="px-3 mt-6">
        <button class="border-0 burger-m-customer my-5 mt-5" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#demo">
            <img src="{{ asset('/images/burger.png') }}" alt="" class="w-h-25px">
        </button>
        <div class="d-flex justify-content-center">
            <div class="row my-3 justify-content-around ml-5">
                <div class="col-lg-3 bg-info py-2 px-4 rounded-sm shadow my-3">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('/images/task-in-progress.png') }}" alt="" class="w-20 rounded-pill">
                        <div class="mx-1">
                            <h4 class="text-white fw-bold margin-b-0">En cours</h4>
                            <p class="text-lg fw-bold text-white">{{ $inProgress }} / {{ $tasks->count() }}</p>
                        </div>
                    </div>
                    <div class="progress">
                        @if ($tasks->count())
                            <div class="progress-bar" style="width:{{ ($inProgress * 100) / $tasks->count() }}%"></div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 ml-5 bg-danger py-2 px-4 rounded-sm shadow my-3">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('/images/task-standby.png') }}" alt="" class="w-20 rounded-pill">
                        <div class="mx-1">
                            <h4 class="text-white fw-bold margin-b-0">En attente</h4>
                            <p class="text-lg fw-bold text-white">{{ $standby }} / {{ $tasks->count() ?? 1 }}</p>
                        </div>
                    </div>
                    <div class="progress">
                        @if ($tasks->count())
                            <div class="progress-bar" style="width:{{ ($standby * 100) / $tasks->count() }}%"></div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 ml-5 bg-success py-2 px-4 rounded-sm shadow my-3">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('/images/task-accomplished.png') }}" alt="" class="w-20 rounded-pill">
                        <div class="mx-1">
                            <h4 class="text-white fw-bold margin-b-0">Accompli</h4>
                            <p class="text-lg fw-bold text-white">{{ $accomplished }} / {{ $tasks->count() ?? 1 }}</p>
                        </div>
                    </div>
                    <div class="progress">
                        @if ($tasks->count())
                            <div class="progress-bar" style="width:{{ ($accomplished * 100) / $tasks->count() }}%"></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            @if ($tasks->count() > 0)
                <p class="margin-b-0 mt-4">
                    <span class="text-lg text-brown fw-bold">{{ $tasks->count() }}</span>
                    <span class="text-md">
                        @if ($tasks->count() > 1)
                            tâches
                        @else
                            tâche
                        @endif au total
                    </span>
                </p>
            @else
                <p class="text-md mt-4">Vous n'avez aucune tâche en moment!</p>
            @endif
            <div class="d-flex align-items-center mt-4">
                <form action="{{ route('customer.task.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="file">
                        <span class="btn btn-outline-secondary mx-3">Impoter</span>
                    </label>
                    <input type="file" name="file" required id="file" class="d-none">
                    <button type="submit" id="import" class="d-none">Envoyer</button>
                </form>
                <a href="{{ route('customer.task.export') }}" class="btn btn-outline-secondary">Exporter</a>
                <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#addTask">
                    <i class="bi bi-plus-lg"></i>
                    tâche
                </button>
            </div>
            <div class="modal fade" id="addTask">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Ajouter une tâche</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('task.store') }}" method="POST" id="taskAdd">
                                @csrf
                                <x-input type="text" label="Titre" name="title"
                                    placeholder="Titre de la tâche"></x-input>
                                <div class="d-flex justify-content-between align-items-center">
                                    <x-input type="date" label="Commencé en" name="begin_at"
                                        placeholder="Commencé le"></x-input>
                                    <x-input type="time" label="Heure" name="hour_begin_at"
                                        placeholder="HH:MM:SS"></x-input>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <x-input type="date" label="Fini le" name="finished_at"
                                        placeholder="Fini en"></x-input>
                                    <x-input type="time" label="Heure" name="hour_finished_at"
                                        placeholder="HH:MM:SS"></x-input>
                                </div>
                                <x-textarea name="description" label="Description"
                                    placeholder="Description de la tâche"></x-textarea>
                                <div class="form-group mt-1">
                                    <label for="observation_id">Observation</label>
                                    <select name="observation_id" class="form-select box-shadow-none"
                                        id="observation_id">
                                        @foreach ($observations as $observation)
                                            <option value="{{ $observation->id }}">{{ $observation->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('observation_id')
                                        <p class="text-sm text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit"
                                    class="btn box-shadow-none px-4 mt-3 btn-light-brown">Ajouter</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger"
                                data-bs-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (session('success_add_task'))
            <div class="alert alert-success text-center my-2">
                {{ session('success_add_task') }}
            </div>
        @endif
        @if (session('updated_task'))
            <div class="alert alert-success text-center my-2">
                {{ session('updated_task') }}
            </div>
        @endif
        @if (session('task_deleted'))
            <div class="alert alert-success text-center my-2">
                {{ session('task_deleted') }}
            </div>
        @endif
        @if (session('success_import'))
            <div class="alert alert-info my-2">
                {{ session('success_import') }}
            </div>
        @endif
        <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
            <p class="margin-b-0">Vous pouvez cliquer sur ce bouton ci-dessous si vous voulez supprimer toutes vos tâches.</p>
            <button class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
        <a href="{{ route('task.delAll') }}" class="btn btn-danger">Supprimer toutes</a>
        <table class="display mt-4" id="taskListCustom">
            <thead class="bg-small-grey">
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Début</th>
                    <th>Mois</th>
                    <th>Observation</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr data-bs-toggle="tooltip" data-bs-title="default">
                        <td class="py-20">
                            {{ substr($task->title, 0, 20) . '...' }}
                            <br><span class="badge bg-primary">{{ $task->created_at->diffForHumans() }}</span>
                        </td>
                        <td>{{ substr($task->description, 0, 45) . '...' }} <a
                                href="{{ route('task.show', ['task' => $task->id]) }}">voir plus</a>
                        </td>
                        <td>
                            <p class="margin-b-0" title="début: {{ $task->begin_at }}"><span
                                    class="fw-bold">{{ $task->hour_begin_at }}</span></p>
                        </td>
                        <td class="text-brown fw-bold">{{ $task->month }}</td>
                        @foreach ($observations as $observation)
                            @if ($observation->id === $task->observation_id)
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="badge @if ($observation->name == 'Accompli') bg-success @endif
                                            @if ($observation->name == 'En attente') bg-danger @endif
                                            @if ($observation->name == 'En cours') bg-info @endif">{{ $observation->name }}</span>
                                    </div>
                                </td>
                            @endif
                        @endforeach
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('task.show', ['task' => $task->id]) }}" class="btn btn-warning"><i
                                        class="bi bi-eye-fill"></i></a>
                                <form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger mx-1"><i
                                            class="bi bi-trash-fill"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
