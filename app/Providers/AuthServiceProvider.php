<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Task;
use App\Policies\TaskPolicy;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Task::class => TaskPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //Envoyer un email
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)->subject("Confirmation de l'adresse email!")
                ->from("tasks@admin.net", "Tasks")
                ->line("Cliquez le bouton ci-dessous pour vérifier votre adresse email")
                ->action("Vérifier", $url);
        });
        $this->registerPolicies();

        //
    }
}
