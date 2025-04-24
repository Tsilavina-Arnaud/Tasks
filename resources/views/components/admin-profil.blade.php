@if ($actifUser->image)
    <img src="{{ $actifUser->getUrl() }}" alt="" class="{{ $class }}">
@else
    <img src="{{ asset('/images/images.png') }}" alt="" class="{{ $class }}">
@endif
