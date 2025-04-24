<?php

namespace App\Notifications;

use App\Models\Task;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AccomplishedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Task $task, public User $user)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("Tâche accomplie")
            ->from('tasks@admin.net', 'Tasks')
            ->line('Une nouvelle tâche vient d\'être accomplie')
            ->line('La tâche: ' . $this->task->title)
            ->action('Voir toutes les tâches', \route('task.index'))
            ->line('Merci à vous d\' avoir utiliser notre application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            "task_id" => $this->task->id,
            "task_title" => $this->task->title,
            "user_id" => $this->user->id,
            "user_mail" => $this->user->email,
            "type" => "accomplished task"
        ];
    }
}
