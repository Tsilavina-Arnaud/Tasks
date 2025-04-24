@extends('layouts.navigation')

@section('title', $task->title)

@section('content')
    @php
        $routeName = request()->route()->getName();
    @endphp
    <div class="py-3 px-4">
        <div class="w-100 d-flex justify-content-center">
            <div class="mx-2">
                <div class="offcanvas offcanvas-start" id="demo">
                    <div class="offcanvas-header">
                        <h1 class="offcanvas-title text-light-grey">Tasks</h1>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="d-flex align-items-center">
                            <div class="w-100">
                                <a class="decoration-none my-3 py-2 text-white px-3 rounded hover-opacity-8 d-block w-100 bg-light-grey" href="{{ route('customer.dashboard') }}">Tableau de bord</a>
                                <a class="decoration-none my-3 py-2 text-white px-3 rounded hover-opacity-8 d-block w-100 bg-light-grey" href="{{ route('profile.edit') }}">Mon profil</a>
                                <a class="decoration-none my-3 py-2 text-white px-3 rounded hover-opacity-8 d-block w-100 bg-light-grey" href="{{ route('task.index') }}">Mes tâches</a>
                                <a class="decoration-none my-3 py-2 text-white px-3 rounded hover-opacity-8 d-block w-100 bg-light-grey" href="{{ route('user.notifications') }}">Notifications</a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="border-0 burger-m-customer" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
                    <img src="{{ asset('/images/burger.png') }}" alt="" class="w-h-25px">
                </button>
            </div>
            <div class="w-demi d-flex justify-content-center">
                <div>
                    <h2 class="text-light-brown capitalize bg-white border-left-pink rounded px-2 py-1">{{ $task->title }}
                    </h2>
                    <form action="{{ route('task.update', ['task' => $task->id]) }}" method="post" class="my-3"
                        id="taskUpdate">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title" class="text-primary">Titre</label>
                            <input type="text" name="title" id="title" value="{{ $task->title }}"
                                class="form-control box-shadow-none py-2">
                        </div>
                        <div class="form-group my-2">
                            <label for="begin_at" class="text-primary">Commencé le</label>
                            <input type="date" name="begin_at" id="begin_at" value="{{ $task->begin_at }}"
                                class="form-control box-shadow-none py-2">
                        </div>
                        <div class="form-group">
                            <label for="hour_begin_at" class="text-primary">Heure</label>
                            <input type="time" name="hour_begin_at" id="hour_begin_at"
                                value="{{ $task->hour_begin_at }}" class="form-control box-shadow-none py-2">
                        </div>
                        <div class="form-group">
                            <label for="finished_at" class="text-primary">Fini le</label>
                            <input type="date" name="finished_at" id="finished_at" value="{{ $task->finished_at }}"
                                class="form-control box-shadow-none py-2">
                        </div>
                        <div class="form-group">
                            <label for="hour_finished_at" class="text-primary">Heure</label>
                            <input type="time" name="hour_finished_at" id="hour_finished_at"
                                value="{{ $task->hour_finished_at }}" class="form-control box-shadow-none py-2">
                        </div>
                        <div class="form-group mt-3">
                            <label for="description" class="text-primary">Description</label>
                            <textarea name="description" id="description" class="form-control box-shadow-none" cols="30" rows="5">
                        {{ $task->description }}
                    </textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="observation_id" class="text-primary">Observation</label>
                            <select name="observation_id" class="form-select box-shadow-none py-2" id="observation_id">
                                @foreach ($observations as $observation)
                                    <option value="{{ $observation->id }}" @selected($observation->id === $task->observation_id)>
                                        {{ $observation->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success mt-3 px-4">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
