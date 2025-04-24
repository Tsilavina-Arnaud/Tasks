<div class="">
    <div class="d-flex align-items-center">
        <div
            class="d-flex mx-4 justify-content-center align-items-center bg-light-grey text-white w-h-40 rounded-circle">
            <a href="{{ route('admin.notifications') }}" class="text-white">
                <span type="button" class="position-relative">
                    <i class="bi bi-envelope text-md"></i>
                    @if ($notificationsAdm > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ $notificationsAdm }}
                            <span class="visually-hidden"></span>
                        </span>
                    @endif
                </span>
            </a>
        </div>
        <div class="d-flex align-items-center">
            <div class="position-relative">
                <x-admin-profil class="w-45px h-45px rounded-50"></x-admin-profil>
                <span class="position-absolute w-12px bg-success top-0 right-0 rounded-circle">
                    <span class="visually-hidden"></span>
                </span>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle decoration-none text-black" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('admin.profil') }}">Mon profil</a></li>
                    <li><a class="dropdown-item" href="#">Paramètre</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">Se déconnecter</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
