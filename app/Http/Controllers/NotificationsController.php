<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function index()
    {
        if (request()->wantsJson() || request()->ajax()) {
            $notifications = Auth::user()->unreadNotifications()
                ->orderBy('created_at', 'desc')->take(10)->get(['data']);

            return response()->json([
                'success' => true,
                'count' => count($notifications),
                'notifications' => $notifications,
            ]);
        }

        $userNotifications = Auth::user()->notifications()
            ->orderBy('created_at', 'desc')->paginate(10);

        return view('notification.index', compact('userNotifications'));
    }

    public function markAllRead()
    {
        Auth::user()->unreadNotifications->markAsRead();

        return response()->json([
                'success' => true,
            ]);
    }
}
