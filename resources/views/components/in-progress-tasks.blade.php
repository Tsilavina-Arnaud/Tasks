<div class="px-1 mt-3">
    <p class="text-md margin-b-0 text-muted">Toutes les tâches en cours</p>
    <table class="table table-striped table-hover table-light mt-3">
        <thead>
            <tr class="fw-bold">
                <td class="text-primary">Titre</td>
                <td class="text-primary">Début</td>
                <td class="text-primary">Fin</td>
                <td class="text-primary">Status</td>
                <td class="text-primary">Clients</td>
                <td class="text-primary">Avatar</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasksInProgress as $tasks)
                <tr>
                    <td>{{ substr($tasks->title, 0, 65) . '...' }}</td>
                    <td>{{ $tasks->begin_at }}</td>
                    <td>{{ $tasks->finished_at }}</td>
                    <td>
                        <span class="badge bg-info">En cours</span>
                    </td>
                    <td>{{ $tasks->name }}</td>
                    <td>
                        @if ($tasks->image)
                            <img src="{{ $tasks->getUrl() }}" alt="" class="w-h-40 rounded-circle">
                        @else
                            <div class="user-none-profil">
                                <span class="text-white fw-bold">
                                    {{ substr($tasks->name, 0, 1) }}
                                </span>
                            </div>
                        @endif
                    </td>
                </tr>
            @empty
                <div class="alert alert-warning">
                    Désolé! Aucune tâche en cours en ce moment.
                </div>
            @endforelse
        </tbody>
    </table>
    {{ $tasksInProgress->links() }}
</div>
