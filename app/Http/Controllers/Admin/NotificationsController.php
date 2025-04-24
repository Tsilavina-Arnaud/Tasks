<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function all()
    {
        $admin = Auth::user();
        foreach ($admin->unreadNotifications as $notifications) {
            $notifications->markAsRead();
        }
        $notificationsAdm = $admin->notifications;
        return \view('admin.notifications', \compact('notificationsAdm'));
    }
}
