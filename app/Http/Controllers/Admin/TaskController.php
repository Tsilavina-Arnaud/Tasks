<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function lists()
    {
        $countAccomplished = User::join('tasks', 'users.id', '=', 'tasks.user_id')
            ->where('observation_id', '=', 3)->orderBy('created_at', 'desc')->count();
        $countInProgress = User::join('tasks', 'users.id', '=', 'tasks.user_id')
            ->where('observation_id', '=', 1)->orderBy('created_at', 'desc')->count();
        $countStandBy = User::join('tasks', 'users.id', '=', 'tasks.user_id')
            ->where('observation_id', '=', 2)->orderBy('created_at', 'desc')->count();
        return \view('admin.all-tasks', \compact('countAccomplished', 'countInProgress', 'countStandBy'));
    }
}
