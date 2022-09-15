<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Notification;
use App\Models\User;
use App\Notifications\OrderNotification;

class SendNotificationForAdminsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public  $order;
    public $auth_name;
    
    public function __construct($order , $auth_name)
    {
        $this->order = $order;
        $this->auth_name = $auth_name;

    }



    public function handle()
    {
        $users = User::whereNotNull('isAdmin')->get();
        Notification::send($users,new OrderNotification($this->order,$this->auth_name));
    }
}
