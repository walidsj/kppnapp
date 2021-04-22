<?php

namespace App\Http\Controllers;

use App\Notification;
use App\ReadNotification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
    public function index()
    {
        $notifications = Notification::leftJoin('read_notifications', function ($join) {
            $join->on('notifications.id', '=', 'read_notifications.notification_id')
                ->where('read_notifications.user_id', '=', Auth::user()->id);
        })->orderBy('notifications.created_at', 'desc')->get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->isoFormat('MMMM YYYY');
        });

        return view('pages.notification', compact('notifications'));
    }

    public function detail($slug)
    {
        $notification = Notification::where('slug', $slug)->firstOrFail();
        $read_status = ReadNotification::where('notification_id', $notification->id)->where('user_id', Auth::user()->id)->first();

        if (empty($read_status)) {
            $read = new ReadNotification();
            $read->notification_id = $notification->id;
            $read->user_id = Auth::user()->id;
            $read->save();
        }

        return view('pages.notification_detail', compact('notification'));
    }

    public function unread($id)
    {
        $read_status = ReadNotification::where('notification_id', intval($id))->where('user_id', Auth::user()->id)->firstOrFail();
        $read_status->forceDelete();
        return redirect()->route('notification');
    }
}
