<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function sendEmail() {
        $data['code']=rand(1000,9999);
        $to='cesarjared1e@gmail.com';
        $subject='Codigo de Verificacion';
        Mail::send('mails.verification', $data, function($message) use ($to, $subject){
                $message->to($to, "StreamRail")
                    ->subject($subject);
                    $message->from('cesarjared1e@gmail.com', 'Bienvenido a StreamRail');
        });
        echo "Email enviado";
    }

    public function userInfo(){
        $users=User::all();
        return view('admin.users-table')->with('users',$users);
    }
}
