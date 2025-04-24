<div class="bg-light-grey position-fixed w-79 top-0 ml-5px py-2 z-3">
    <div class="d-flex justify-content-between align-items-center px-4">
        <p class="text-lg margin-b-0 text-white">{{ $title }}</p>
        <div class="d-flex align-items-center">
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
                <a class="dropdown-toggle text-white decoration-none" href="{{ route('profile.edit') }}" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
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
