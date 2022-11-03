<?php
/**
 * Created by PhpStorm.
 * User: awlad
 * Date: 11/3/2022
 * Time: 10:45 PM
 */

namespace App\Services;


use App\Mail\NotificationMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public static function sendNotification($userId){
//        $user = User::find($userId);
//
//        mail send from here
//        Mail::to($user->email)->send(new NotificationMail());
    }
}