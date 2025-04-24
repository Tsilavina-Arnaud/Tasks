@extends('layouts.navigation')

@section('title', 'Mon profil')

@section('content')
    <x-custom-nav-profil title="Mon profil"></x-custom-nav-profil>
    <div class="py-12 mt-6 bg-small-grey rounded-16">
        <div class="d-md-flex mt-6 align-items-center justify-content-center bg-light ">
            <div class="px-5 py-4 w-demi rounded-16 mt-4 border-end">
                <div class="">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <div class="w-demi">
                <div class="p-4">
                    <div class="">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
                <div class="p-4">
                    <div class="">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
