<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class progress extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $taskscircle,
        public $taskstotal
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.progress');
    }
}
