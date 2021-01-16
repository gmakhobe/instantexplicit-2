<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function Profile($Username)
    {
        //Get user information
        $username = session()->get('user_info')["Username"];
        $user_info = DB::select('select * from users where username = ?', [$Username]);

        if ($Username == $username || $user_info[0]->user_type)
        {
            $IsCurrentUser = ($Username == $username ? 1 : 0);
            return view('user/user-username',  ["Username"=> $username, "UserInfo"=> $user_info[0], "IsCurrentUser"=> $IsCurrentUser]);
        }
        else
        {
            return view('user/other-user-username', ["Username"=> $username]);
        }
        
    }

    public function Explore()
    {
        $username = session()->get('user_info')["Username"];

        return view('user/explore', ["Username"=> $username]);
    }

    public function Explorer()
    {
        $username = session()->get('user_info')["Username"];

        return view('user/explorer', ["Username"=> $username]);
    }

    public function Inbox()
    {
        $username = session()->get('user_info')["Username"];

        return view('user/inbox', ["Username"=> $username]);
    }
}
