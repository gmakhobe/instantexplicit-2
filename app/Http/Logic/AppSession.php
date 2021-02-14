<?php

namespace App\Http\Logic;

class AppSession{
    //Set session
    public static function sessionSet($instance){
        //Create an array
        $BuildSessionUserData = array(
            "Id"=> $instance[0]->Id,
            "Name"=> $instance[0]->full_name,
            "Username"=> $instance[0]->username,
            "Email"=> $instance[0]->email_address
        );

        //Initiate request to set session
        session()->put("user_info", $BuildSessionUserData);
        //session()->put("userProfileURL", $BuildSessionProfilePictureUrl);
    }

    public static function sessionGetUserInfo(){
        return session()->get('user_info');
    }

    /*public static function sessionGetUserProfilePicture(){
        return session()->get('userProfileURL');
    }*/
    /*
        print_r();
        echo "<br>";
        print_r('));
        echo "<br>Session set successfully";
    */
}