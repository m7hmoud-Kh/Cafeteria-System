<?php

namespace  App\Http\trait;

use App\Models\User;
use App\Notifications\OrderNotification;
use App\Notifications\TrackingOrderNotification;
use Notification;


trait OrderNotificationTrait
{
    public function send_notificatio_order_to_admins($order){
        $users = User::whereNotNull('isAdmin')->get();
        Notification::send($users,new OrderNotification($order));
    }

    public function send_notification_order_to_specifi_user($user_id,$data){
        $user = User::find($user_id);
        Notification::send($user, new TrackingOrderNotification($data));
    }
}
