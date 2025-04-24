<div class="px-1 mt-3">
    <p class="text-md margin-b-0 text-muted">Toutes les tâches accomplies</p>
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
            @forelse ($tasksAccomplished as $tasks)
                <tr class="align-middle">
                    <td class="py-20">{{ substr($tasks->title, 0, 65) . '...' }}</td>
                    <td>{{ $tasks->begin_at }}</td>
                    <td>{{ $tasks->finished_at }}</td>
                    <td>
                        <span class="badge bg-success">Accomplie</span>
                    </td>
                    <td>{{ $tasks->name }}</td>
                    <td>
                        @if ($tasks->image)
                            <a
                                href="{{ route('admin.userList.show', ['email' => $tasks->email, 'user' => $tasks->user_id]) }}">
                                <img src="{{ $tasks->getUrl() }}" alt="" class="w-h-40 rounded-circle">
                            </a>
                        @else
                            <div class="user-none-profil">
                                <a class="decoration-none"
                                    href="{{ route('admin.userList.show', ['email' => $tasks->email, 'user' => $tasks->user_id]) }}">
                                    <span class="text-white fw-bold">
                                        {{ substr($tasks->name, 0, 1) }}
                                    </span>
                                </a>
                            </div>
                        @endif
                    </td>
                </tr>
            @empty
                <div class="alert alert-warning">
                    Désolé! Aucune tâche accomplie en ce moment.
                </div>
            @endforelse
        </tbody>
    </table>
    {{ $tasksAccomplished->links() }}
</div>
