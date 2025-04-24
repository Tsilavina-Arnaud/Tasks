<div class="form-group mt-2">
    <label for="{{ $name }}" class="capitalize text-light-grey">{{ $label }}</label>
    <input type="{{ $type }}" autocomplete="off" value="{{ old($name, $value) }}" name="{{ $name }}" id="{{ $name }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge([
            'class' => 'form-control box-shadow-none py-2',
        ]) }}>
    @error($name)
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>
