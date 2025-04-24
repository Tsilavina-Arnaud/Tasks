<div {{ $attributes->merge([
    'class' => 'form-group mt-2',
]) }}>
    <label for="{{ $name }}" class="capitalize text-light-brown">{{ $label }}</label>
    <textarea name="{{ $name }}" value="{{ old($name) }}" id="{{ $name }}" cols="10" rows="3"
        placeholder="{{ $placeholder }}" {{ $attributes->merge(['class' => 'form-control box-shadow-none']) }}>
        {{ old($name) }}
    </textarea>
    @error($name)
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>
