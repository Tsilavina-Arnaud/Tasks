@extends('customer.base')

@section('title', 'Bienvenue sur Tasks')

@section('content')
    <div id="swup" class="transition-fade">
        <div class="container-fluid bg-pink py-13">
            <div class="d-flex align-items-center container">
                <div>
                    <h1 class="fw-bold animate__animated animate__bounceInDown animate__repeat-1">
                        Vous avez besoin d'aide pour la gestion de vos tâches?
                        <span class="text-light-grey">" Tasks " est fait pour vous.</span>.
                    </h1>
                    <div class="d-flex justify-content-start">
                        <a href="{{ route('login') }}"
                            class="animate__animated animate__fadeInLeft decoration-none text-white bg-light-grey mt-4 text-md px-5 py-3 rounded-pill shadow hover-opacity-8">Commencer</a>
                    </div>
                </div>
                <img src="{{ asset('/images/tasks.jpg') }}" alt="" class="w-30 rounded-sm">
            </div>
        </div>
        <div class="container">
            <div class="row translateY-neg-35">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-2">
                    <div class="shadow-sm bg-white p-4 animate__animated animate__fadeInLeft">
                        <img src="{{ asset('/header/task.jpg') }}" alt="" class="w-20">
                        <p class="text-lg my-3">"Tasks", votre assistant</p>
                        <span class="text-muted">
                            Organisez vos tâches de manière claire et efficace. Notre outil vous aide à suivre vos
                            priorités, à respecter vos délais et à ne rien oublier.
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-2">
                    <div class="shadow-sm bg-white p-4 animate__animated animate__fadeInUpBig">
                        <img src="{{ asset('/images/create-icon.jpg') }}" alt="" class="w-20">
                        <p class="text-lg my-3">Créer et modifier</p>
                        <span class="text-muted">
                            Avec notre interface intuitive, vous pouvez rapidement ajouter, modifier et suivre vos tâches.
                            Concentrez-vous sur ce qui compte vraiment et laissez-nous gérer le reste.
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-2">
                    <div class="shadow-sm bg-white p-4 animate__animated animate__fadeInRight">
                        <img src="{{ asset('/header/task1.png') }}" alt="" class="w-20 rounded-pill">
                        <p class="text-lg my-3">Statistique des tâches</p>
                        <span class="text-muted">
                            Vous aurez un tableau de bord pour la statistique de vos tâches, lesquelles sont accomplies et
                            lesquelles sont en cours.
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-2" data-aos="fade-right">
                        <img src="{{ asset('/images/service-icon.png') }}" alt="" class="w-20 rounded-pill">
                        <p class="text-lg text-brown">Explorer les meilleurs <span class="fw-bold">services</span> chez nous
                        </p>
                        <p class="text-muted mt-3" data-aos="fade-right">
                            Vous cherchez à améliorer votre gestion des tâches et à augmenter votre productivité ? Tasks est
                            là pour vous offrir la solution idéale. Nous vous invitons à découvrir notre service phare qui a
                            déjà transformé la vie de nombreux utilisateurs.
                        </p>
                        <p class="my-1 fw-bold" data-aos="fade-right">Pourquoi découvrir le meilleur service de Tasks ?</p>
                        <ul class="mt-2">
                            <li class="py-3" data-aos="fade-left">
                                <strong class="text-info">Simplicité et Efficacité :</strong> Profitez d’une interface
                                intuitive qui rend la gestion de vos tâches
                                simple et rapide. Vous pouvez facilement organiser, suivre et accomplir vos tâches sans
                                stress.
                            </li>
                            <li class="py-3" data-aos="fade-left">
                                <strong class="text-info">Optimisation Personnalisée :</strong> Notre service s’adapte à vos
                                besoins spécifiques, vous offrant
                                des outils et des fonctionnalités personnalisées pour une gestion sur mesure de vos projets.
                            </li>
                            <li class="py-3" data-aos="fade-left">
                                <strong class="text-info">Support Exceptionnel :</strong> Bénéficiez d’une assistance dédiée
                                pour vous guider à chaque étape.
                                Notre équipe est prête à vous aider et à répondre à toutes vos questions pour que vous
                                puissiez tirer le meilleur parti de notre service.
                            </li>
                            <li class="py-3" data-aos="fade-left">
                                <strong class="text-info">Innovations Constantes :</strong> Nous nous engageons à améliorer continuellement notre service pour
                                vous offrir les dernières fonctionnalités et les meilleures pratiques en matière de gestion
                                des tâches.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <hr>
            <div class="row mt-5 mb-2 px-5">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" data-aos="fade-down-right">
                    <h5 class="text-secondary text-center">Une plateforme créer pour gérer les tâches de plusieurs utilisateurs
                        gratuittements
                    </h5>
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
