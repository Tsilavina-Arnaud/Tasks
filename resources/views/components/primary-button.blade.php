<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-outline-primary px-4']) }}>
    {{ $slot }}
</button>
