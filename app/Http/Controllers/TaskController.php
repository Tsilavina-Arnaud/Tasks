<?php

namespace App\Http\Controllers;

use App\Exports\TasksExport;
use App\Http\Requests\TaskFormRequest;
use App\Imports\TasksImport;
use App\Models\Observation;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $tasks = Task::with(['user'])->orderBy('created_at', 'desc')->where("user_id", "=", $userId)->get();
        $accomplishedTask = Task::with('user')->where("user_id", "=", $userId)->where("observation_id", "=", 3)->count();
        $inProgressTask = Task::with('user')->where("user_id", "=", $userId)->where("observation_id", "=", 1)->count();
        $standbyTask = Task::with('user')->where("user_id", "=", $userId)->where("observation_id", "=", 2)->count();
        $user = User::find(Auth::user()->id);
        $notificationsCount = $user->unreadNotifications->count();
        return \view("customer.task", [
            "observations" => Observation::all(),
            "tasks" => $tasks,
            "actif_user" => User::find(Auth::user()->id),
            "accomplished" => $accomplishedTask,
            "inProgress" => $inProgressTask,
            "standby" => $standbyTask,
            "unreadNotifications" => Auth::user()->unreadNotifications->count(),
            "notificationsCount" => $notificationsCount
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskFormRequest $request)
    {
        $begin_at = Carbon::parse($request->validated("begin_at"));
        $month = $begin_at->isoFormat("MMMM");
        $userId = Auth::user()->id;
        Task::create([
            "title" => $request->validated("title"),
            "description" => $request->validated("description"),
            "user_id" => $userId,
            "observation_id" => $request->validated("observation_id"),
            "begin_at" => $request->validated("begin_at"),
            "hour_begin_at" => $request->validated("hour_begin_at"),
            "finished_at" => $request->validated("finished_at"),
            "hour_finished_at" => $request->validated("hour_finished_at"),
            "month" => $month
        ]);

        return \redirect()->route("task.index")->with("success_add_task", "Une nouvelle tâche vient d'être ajouter");
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        if ($this->authorize("view", $task)) {
            return \view("customer.show-task", [
                "observations" => Observation::all(),
                "task" => $task,
                "actif_user" => User::find(Auth::user()->id),
                "unreadNotifications" => Auth::user()->unreadNotifications->count()

            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskFormRequest $request, Task $task)
    {
        $begin_at = Carbon::parse($request->validated("begin_at"));
        $month = $begin_at->isoFormat("MMMM");
        $task->update([
            "title" => $request->validated("title"),
            "description" => $request->validated("description"),
            "observation_id" => $request->validated("observation_id"),
            "begin_at" => $request->validated("begin_at"),
            "hour_begin_at" => $request->validated("hour_begin_at"),
            "finished_at" => $request->validated("finished_at"),
            "hour_finished_at" => $request->validated("hour_finished_at"),
            "month" => $month
        ]);

        return \redirect()->route('task.index')->with("updated_task", "Modification bien enregistrer");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return \to_route("task.index")->with("task_deleted", "Suppression bien efféctuer");
    }

    public function deleteAll()
    {
        Task::where('user_id', '=', Auth::user()->id)->delete();
        return \back();
    }

    /**
     * export user's tasks
     */
    public function export()    
    {
        return (new TasksExport(Auth::user()->id))->download('tasks.xlsx');
    }
    
    /**
     * import user's tasks
     */
    public function import()
    {
        Excel::import(new TasksImport, \request()->file('file'));

        return \back()->with('success_import', 'Importation de votre tâche avec succès');
    }

}
