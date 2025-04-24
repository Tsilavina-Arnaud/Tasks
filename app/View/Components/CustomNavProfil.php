<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class CustomNavProfil extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $user = User::find(Auth::user()->id);
        $notificationsCount = $user->unreadNotifications->count();
        return view('components.custom-nav-profil', \compact('user', 'notificationsCount'));
    }
}
