<?php

namespace App\Http\Controllers;

use App\Models\Observation;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerDashboardController extends Controller
{

    public function index(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::find(Auth::user()->id);
        $notificationsCount = $user->unreadNotifications->count();
        return view('dashboard', [
            'observations' => Observation::all(),
            "actif_user" => User::find(Auth::user()->id),
            "tasksTotal" => Task::with("user")->where("user_id", "=", $userId)->count(),
            "tasksInProgress" => $this->getTasksInProgress(),
            "tasksCircles" => $this->getCircleProgressTasks($request)[0],
            "monthActive" => $this->getCircleProgressTasks($request)[1],
            "unreadNotifications" => Auth::user()->unreadNotifications->count(),
            "notificationsCount" => $notificationsCount
        ]);
    }

    public function getCircleProgressTasks(Request $request)
    {
        if ($request->month) {
            $monthN = $request->month;
        } else {
            $monthN = now()->isoFormat("MMMM");
        }

        $activeId = Auth::user()->id;
        $tasksCircle = Task::join('observations', 'tasks.observation_id', '=', 'observations.id')->where('tasks.month', '=', $monthN)
            ->select(
                DB::raw('COUNT(tasks.id) as count'),
                'tasks.month',
                'observations.name',
            )->where('user_id', '=', $activeId)
            ->groupBy('month')->groupBy('observations.name')->orderBy('month')->orderBy('observations.name')
            ->get();
        return [$tasksCircle, $monthN];
    }

    public function getChartTasks(Request $request)
    {
        if ($request->yearSelected) {
            $yearN = $request->yearSelected;
        } else {
            $yearN = now()->format("Y");
        }

        $activeId = Auth::user()->id;
        $tasksMonth = Task::join('observations', 'tasks.observation_id', '=', 'observations.id')
            ->select(
                'tasks.month',
            )->where("observations.name", "=", "Accompli")
            ->where('user_id', '=', $activeId)
            ->whereYear('begin_at', $yearN)
            ->orderBy('month')
            ->distinct()
            ->get();
        $tasksCount = Task::join('observations', 'tasks.observation_id', '=', 'observations.id')
            ->select(DB::raw('COUNT(tasks.id) as count'))
            ->where("observations.name", "=", "Accompli")
            ->where('user_id', '=', $activeId)
            ->whereYear('begin_at', $yearN)->groupBy('month')
            ->orderBy('month')
            ->get();

        return response()->json(["labels" => $tasksMonth, "datas" => $tasksCount]);
    }

    public function getTasksInProgress()
    {
        $tasks = Task::join('observations', 'tasks.observation_id', '=', 'observations.id')
            ->where('user_id', '=', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return $tasks;
    }
}
