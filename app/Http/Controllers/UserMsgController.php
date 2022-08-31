<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\UserCreated;
class UserMsgController extends Controller
{
    public function send_message(){
        UserCreated::dispatch(['name'=>'Wolney','age'=>31]);
    }
}
