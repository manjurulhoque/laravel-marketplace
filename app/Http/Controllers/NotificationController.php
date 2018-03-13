<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function show($notification)
    {
        $noty = DB::table('notifications')->where('id', $notification)->first();

        // TODO
    }
}
