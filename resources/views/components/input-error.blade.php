@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-md']) }}>
        @foreach ((array) $messages as $message)
            <li class="text-danger text-xs">{{ $message }}</li>
        @endforeach
    </ul>
@endif
