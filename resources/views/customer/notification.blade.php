@extends('layouts.navigation')

@section('title', 'Notifications')

@section('content')
    <x-custom-nav-profil title="Notifications" />
    <div class="mt-6">
        <div class="d-flex justify-content-center">
            <div class="w-demi">
                <button class="border-0 burger-m-customer my-3" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#demo">
                    <img src="{{ asset('/images/burger.png') }}" alt="" class="w-h-25px">
                </button>
                <p class="text-lg bg-white rounded-sm px-2 border-left-danger margin-b-0">
                    notifications
                </p>
                @if (session('delete_notification'))
                    <div class="alert alert-warning mt-2">
                        {{ session('delete_notification') }}
                    </div>
                @endif
                @foreach ($notifications as $notification)
                    <div class="alert alert-secondary my-3">
                        <p class="margin-b-0">
                            La tâche "<strong>{{ $notification->data['task_title'] }}</strong>"
                            est @if ($notification->data['type'] === 'accomplished task')
                                accomplie
                            @else
                                en cours
                            @endif
                        </p>
                        <span class="text-white badge bg-success">
                            {{ $notification->created_at->diffForHumans() }}
                        </span>
                        <div class="d-flex justify-content-end align-items-center">
                            <a title="voir cette tâche"
                                href="{{ route('task.show', ['task' => $notification->data['task_id']]) }}"
                                class="mx-2"><i class="bi bi-eye-fill"></i></a>
                            <form action="{{ route('user.notification.delete', ['id' => $notification->id]) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="border-0 bg-none text-danger"
                                    title="supprimer cette notification"><i class="bi bi-trash-fill"></i></button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
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
@endsection
