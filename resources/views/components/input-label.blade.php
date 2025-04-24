@props(['value'])

<label {{ $attributes->merge(['class' => 'text-light-grey']) }}>
    {{ $value ?? $slot }}
</label>
