<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Providers\UserActivityEvent;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('receiver_id', Auth::user()->id)->orWhere('receiver_id', 0)->get();

        return view('notification.index', compact('notifications'));
    }

    public function view(Request $request)
    {
        $notification = Notification::where('id', $request->id)->first();

        // block if user is not receiver
        if ($notification->receiver_id != Auth::user()->id && $notification->receiver_id != 0) {
            return back();
        }

        return view('notification.view', compact('notification'));
    }

    public function add(Request $request)
    {
        $add = $request->all();

        $notification = Notification::create($add);

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Post notification ' . $request->title . ' (id: ' . $notification->id . ')'));

        return back()->with('success', 'Notification successfully posted!');
    }

    public function delete(Request $request)
    {
        $notification = Notification::where('id', $request->id)
            ->first();

        // block if user is not receiver
        if ($notification->receiver_id != Auth::user()->id && $notification->receiver_id != 0) {
            abort(403, "Forbidden.");
        }

        // if notification only has permission can delete
        if ($notification->receiver_id == 0 && !has_permission('notification')) {
            abort(403, "Forbidden.");
        }

        // hard delete in db
        Notification::where('id', $request->id)
            ->delete();

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Delete notification ' . $notification->title . ' (id: ' . $notification->id . ')'));

        $notifications = Notification::where('receiver_id', Auth::user()->id)->orWhere('receiver_id', 0)->get();

        return view('notification.index', compact('notifications'))->with('success', 'Notification successfully posted!');
    }
}