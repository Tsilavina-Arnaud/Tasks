@extends('customer.base')

@section('title', 'Contactez nous')

@section('content')
    <div id="swup" class="transition-fade">
        <div class="bg-pink py-16">
            <div class="container">
                <h1 class="fw-bold animate__animated animate__fadeInUpBig">Nous contactez</h1>
                <p class="text-muted animate__animated animate__fadeInLeftBig">N'hésitez pas à nous contacter si vous voulez de l'aide</p>
            </div>
        </div>
        <div class="container my-5">
            @if (session('success_contact'))
                <div class="alert alert-success">
                    {{ session('success_contact') }}
                </div>
            @endif
            <div data-aos="fade-up">
                <div class="contact-section">
                    <div class="py-5 px-3 bg-brown contact-information">
                        <p class="text-lg text-white margin-b-0">Contactez nous</p>
                        <p class="text-light-grey">Visiter notre page: </p>
                        <div class="mt-4">
                            <span class="text-white d-block">
                                <a href="https://www.facebook.com" class="text-white decoration-none"><i
                                        class="bi bi-facebook"></i> Tasks</a>
                            </span>
                            <span class="text-white d-block mt-3">
                                <a href="mailto:tasks@gmail.com" class="text-white decoration-none"><i
                                        class="bi bi-envelope-fill"></i> tasks@gmail.com</a>
                            </span>
                            <span class="text-white d-block mt-3">
                                <a href="tel:+261349774413" class="text-white decoration-none"><i
                                        class="bi bi-telephone-fill"></i> +261 34 97 744 13</a>
                            </span>
                        </div>
                    </div>
                    <div class="shadow py-5 contact-form">
                        <p class="text-lg margin-b-0">Envoyez nous un message</p>
                        <p class="text-muted">Remplissez ce formulaire s'il vous plaît.</p>
                        <form action="{{ route('contact.contact') }}" method="post">
                            @csrf
                            <x-input label="" type="text" name="nom" placeholder="John"></x-input>
                            <x-input label="" type="email" name="email" placeholder="john@doe.fr"></x-input>
                            <x-textarea label="" name="message"
                                placeholder="Ecrivez votre message ici ..."></x-textarea>
                            <button type="submit" class="btn btn-light-brown mt-3 px-4 rounded-pill">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-black">
            <div class="container">
                @include('shared.footer')
            </div>
        </div>
    </div>
    
@endsection
