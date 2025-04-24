<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $monthN = now()->isoFormat('MM');
        $usersCount = User::where('role', '<>', 'admin')->get();
        $usersAvatar = User::where('role', '<>', 'admin')->get();
        //All users
        $users = User::where('role', '<>', 'admin')->get();
        if ($usersCount->count() > 9) {
            $usersAvatar = User::where('role', '<>', 'admin')->limit(9)->get();
        }
        //All new users fro monthN
        $usersMonthN = User::whereMonth('created_at', $monthN)->get();
        return \view('admin.user', \compact('users', 'usersAvatar', 'usersCount', 'usersMonthN'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return \redirect()->route("admin.userList");
    }

    public function show(string $email, User $user)
    {
        if ($user->email === $email) {
            $tasksUser = Task::join('observations', 'tasks.observation_id', '=', 'observations.id')
                ->select(
                    DB::raw('COUNT(tasks.id) as count'),
                    'observations.name'
                )->where('tasks.user_id', '=', $user->id)
                ->groupBy('observations.name')->get();
            //User's tasks total
            $totalTasks = Task::join('observations', 'tasks.observation_id', '=', 'observations.id')
                ->select(
                    DB::raw('COUNT(tasks.id) as total')
                )
                ->where('tasks.user_id', '=', $user->id)
                ->value('total');
            return \view("admin.user-tasks", [
                'user' => $user,
                'tasksUser' => $tasksUser,
                'total' => $totalTasks
            ]);
        } else {
            return \to_route("admin.userList");
        }
    }
}
