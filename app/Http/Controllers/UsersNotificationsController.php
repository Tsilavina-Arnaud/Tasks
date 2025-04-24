<?php

namespace App\Http\Controllers;

use App\Models\Observation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersNotificationsController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        foreach ($user->unreadNotifications as $notifs) {
            $notifs->markAsRead();
        }
        $notifications = $user->notifications;
        return view('customer.notification', [
            "notifications" => $notifications,
            "unreadNotifications" => $user->unreadNotifications->count(),
            "actif_user" => User::find(Auth::user()->id),
            "observations" => Observation::all()
        ]); 
    }

    public function delete(string $id)
    {
        $notificationId = DB::table('notifications')->delete($id);
        return \back()->with('delete_notification', 'Notification bien supprimer');
    }
}
