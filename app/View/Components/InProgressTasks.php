<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InProgressTasks extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $tasksInProgress = User::join('tasks', 'users.id', '=', 'tasks.user_id')
            ->where('observation_id', '=', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('components.in-progress-tasks', \compact('tasksInProgress'));
    }
}
