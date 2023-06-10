<?php

namespace App\Http\Controllers;

use App\Http\Resources\NotificationResourcee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $notifications = $request->user()->notifications()->latest('created_at')->paginate(request('per_page'));

        return $this->sendSuccess([ 'data' => NotificationResourcee::collection($notifications)], 'Notifications retrieved');
    }

    public function update(Request $request, $notificationId)
    {
        DB::table('notifications')->where('id', $notificationId)->update(['read_at' => Carbon::now()]);
        return $this->sendSuccess([], 'Message mark as read');
    }
}
