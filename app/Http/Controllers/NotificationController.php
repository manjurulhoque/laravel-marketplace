<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class NotificationController extends Controller
{
    public function show($notification)
    {
        $noty = DB::table('notifications')->where('id', $notification)->first();

        // TODO
    }

    public function readall()
    {
        $user = Auth::user();

        $user->unreadNotifications->markAsRead();

        return redirect()->route('profile', Auth::user()->name);
    }
}
