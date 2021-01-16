<?php

namespace App\Http\Logic;

class AppSession{
    //Set session
    public static function sessionSet($instance){
        //Create an array
        $BuildSessionUserData = array(
            "Name"=> $instance[0]->fullName,
            "Username"=> $instance[0]->username,
            "Email"=> $instance[0]->email_address
        );

        //Specifically for image url
        /*if (!$instance[0]->ProfilePicture){
            $ProfilePicture = "images/user-icon.svg";
            $IsBase64 = 0;
        }else{
            $ProfilePicture = $instance[0]->ProfilePicture;
            $IsBase64 = 1;
        }*/

        /*$BuildSessionProfilePictureUrl = array(
            "Base64"=> $ProfilePicture,
            "IsBase64"=> $IsBase64
        );*/

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