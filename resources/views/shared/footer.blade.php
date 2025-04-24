<div class="mt-5 row">
    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 py-5">
        <img src="{{ asset('/header/task.jpg') }}" alt="logo-tasks" class="logo rounded-pill">
        <p class="text-md text-light-grey d-inline margin-b-0">Tasks</p>
        <p class="fw-bold text-white mt-2">Une plateforme de gestionnaire de tâches gratuitement</p>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 py-5">
        <p class="fw-bold text-white text-center text-md">
            Menu
        </p>
        <div class="text-center">
            <a href="{{ route('welcome') }}"
                class="d-block pt-2 text-light-brown decoration-none fw-bold foot-nav-link">Accueil</a>
            <a href="{{ route('service') }}"
                class="d-block pt-2 text-light-brown decoration-none fw-bold foot-nav-link">Service</a>
            <a href="{{ route('contact') }}"
                class="d-block pt-2 text-light-brown decoration-none fw-bold foot-nav-link">Contact</a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 py-5">
        <p class="fw-bold text-white text-center text-md">
            Contact
        </p>
        <span class="text-light-grey text-center d-block">Veuillez nous contacter sur: </span>
        <div class="pt-2">
            <a href="https://www.facebook.com" class="d-block text-center foot-nav-link decoration-none" target="blank">
                <i class="bi bi-facebook"></i>
                <span>Task Manager</span>
            </a>
            <a href="https://www.twitter.com" class="d-block text-center foot-nav-link decoration-none" target="blank">
                <i class="bi bi-twitter-x"></i>
                <span>Tasks</span>
            </a>
            <a href="mailto:tasks@gmail.com" class="d-block text-center foot-nav-link decoration-none" target="blank">
                <i class="bi bi-envelope-at"></i>
                tasks@gmail.com
            </a>
        </div>
    </div>
</div>
