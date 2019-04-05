<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function read()
    {
        $notifications = Notification::where('notifiable_id', Auth::user()->id)->where("read_at", null)->orderBy('created_at', 'desc')->get();
        foreach ($notifications as $value) {
            $value->read_at = 1;
            $value->save();
        }
    }

}
