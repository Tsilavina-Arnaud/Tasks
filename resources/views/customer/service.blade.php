@extends('customer.base')

@section('title', 'Notre service')

@section('content')
    <div class="transition-slide" id="swup">
        <div class="py-13 bg-pink">
            <div class="container d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold animate__animated animate__fadeInTopLeft">Notre service</h1>
                    <p class="text-muted margin-b-0 animate__animated animate__lightSpeedInLeft">Profitez de notre expertise pour gérer vos tâches</p>
                </div>
                <img src="{{ asset('/images/service-ill.jpg') }}" alt="" class="w-30 animate__animated animate__fadeInTopRight">
            </div>
        </div>
        <div class="d-flex justify-content-center" data-aos="flip-left">
            <div class="bg-brown p-3 card-service">
                <p class="text-md text-white margin-b-0">
                    Hey! <span class="text-light-grey">Tasks</span> est une plateforme en ligne <br>
                    pour gérer vos tâches, liste et fournir <br>
                    un tableau de bord pour vos tâches.
                </p>
            </div>
        </div>
        <div class="container" data-aos="zoom-in-right">
            <div class="d-flex align-items-center">
                <img src="{{ asset('/images/check.jpg') }}" alt="" class="w-50px rounded-pill">
                <h3 class="fw-bold mx-2">Efficacité de notre service?</h3>
            </div>
            <p class="text-md text-muted mt-4">
                Nous nous engageons à offrir une expérience exceptionnelle à chaque client. Votre satisfaction est notre
                priorité ultime, et nous sommes heureux de savoir que nous avons répondu à vos attentes. Merci pour vos
                éloges ! Nous nous efforçons constamment d'améliorer nos services pour vous offrir encore plus de valeur.
                N'hésitez pas à nous faire part de vos suggestions ou besoins futurs. Votre feedback est précieux et nous
                inspire à aller toujours plus loin.
            </p>
        </div>
        <div class="bg-black">
            <div class="container">
                @include('shared.footer')
            </div>
        </div>
    </div>

@endsection
