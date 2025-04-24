<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class adminProfil extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $class = "")
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $actifUser = User::find(Auth::user()->id);
        return view('components.admin-profil', ['actifUser' => $actifUser]);
    }
}
