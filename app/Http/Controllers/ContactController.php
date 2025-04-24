<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\User;
use App\Notifications\ContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function index()
    {
        return \view("customer.contact");
    }

    public function contact(ContactFormRequest $request)
    {
        /** @var User */
        $user = User::where('email', '=', 'tasks@admin.net')->get();
        foreach ($user as $admin) {
            $admin->notify(new ContactNotification($request->validated()));
        }
        return \back()->with("success_contact", "Votre message est bien envoyé!");
    }
}
