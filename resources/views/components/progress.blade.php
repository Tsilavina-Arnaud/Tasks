<div class="w-100 py-2 rounded">
    <div class="d-md-flex justify-content-between align-items-center">
        @if ($taskscircle->name === 'Accompli')
            <img src="{{ asset('/images/task-accomplished.png') }}" alt="" class="w-h-25px">
            <div>
                <p class="fw-bold margin-b-0">
                    {{ $taskscircle->name }}
                </p>
            </div>
            <Circle-progress value={{ $taskscircle->count ?? 0 }} max="{{ $taskstotal ?? 100 }}"
                text-format="percent"></Circle-progress>
        @else
            <img src="{{ asset('/images/task-accomplished.png') }}" alt="" class="w-h-25px">
            <div>
                <p class="fw-bold margin-b-0">
                    Accomplie
                </p>
            </div>
            <Circle-progress value="0" max="100" text-format="percent"></Circle-progress>
        @endif

        @if ($taskscircle->name === 'En attente')
            <img src="{{ asset('/images/task-standby.png') }}" alt="" class="w-h-25px">
            <div>
                <p class="fw-bold margin-b-0">
                    {{ $taskscircle->name }}
                </p>
            </div>
            <Circle-progress value={{ $taskscircle->count ?? 0 }} max="{{ $taskstotal ?? 100 }}"
                text-format="percent"></Circle-progress>
        @else
            <img src="{{ asset('/images/task-standby.png') }}" alt="" class="w-h-25px">
            <div>
                <p class="fw-bold margin-b-0">
                    En attente
                </p>
            </div>
            <Circle-progress value="0" max="100" text-format="percent"></Circle-progress>
        @endif

        @if ($taskscircle->name === 'En cours')
            <img src="{{ asset('/images/task-in-progress.png') }}" alt="" class="w-h-25px">
            <div>
                <p class="fw-bold margin-b-0">
                    {{ $taskscircle->name }}
                </p>
            </div>
            <Circle-progress value={{ $taskscircle->count ?? 0 }} max="{{ $taskstotal ?? 100 }}"
                text-format="percent"></Circle-progress>
        @else
            <img src="{{ asset('/images/task-in-progress.png') }}" alt="" class="w-h-25px">
            <div>
                <p class="fw-bold margin-b-0">
                    En cours
                </p>
            </div>
            <Circle-progress value="0" max="100" text-format="percent"></Circle-progress>
        @endif
    </div>
</div>
