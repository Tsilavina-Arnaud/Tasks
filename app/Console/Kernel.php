<?php

namespace App\Console;

use App\Models\Task;
use App\Models\User;
use App\Notifications\AccomplishedNotification;
use App\Notifications\InProgressNotification;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        //Delete users unverified email hourly
        $schedule->call(function () {
            $users_unverified = User::all()->where('email_verified_at', '=', '');
            foreach ($users_unverified as $unverified) {
                $unverified->delete();
            }
        })->hourly();

        //Automatize taks's begin and finished and 
        $schedule->call(function () {
            $date = now()->isoFormat('YYYY-MM-DD');
            $hour = now()->isoFormat(('HH:mm'));
            $tasks = Task::all();
            foreach ($tasks as $task) {
                if (
                    $task->begin_at <= $date &&
                    $task->hour_begin_at <= $hour &&
                    $task->finished_at >= $date &&
                    $task->hour_finished_at >= $hour
                ) {
                    $task->update(['observation_id' => 1]);
                }
                if ($task->finished_at <= $date && $task->hour_finished_at <= $hour) {
                    $task->update(['observation_id' => 3]);
                }
                //Acomplished tasks notifications
                if ($task->finished_at === $date && $task->hour_finished_at === $hour) {
                    $user = User::find($task->user_id);
                    $user->notify(new AccomplishedNotification($task, $user));
                }
                //In progress tasks notifications
                if ($task->begin_at === $date && $task->hour_begin_at === $hour) {
                    $user = User::find($task->user_id);
                    $user->notify(new InProgressNotification($task, $user));
                }
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
