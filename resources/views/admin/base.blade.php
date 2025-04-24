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
