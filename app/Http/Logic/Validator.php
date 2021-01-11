<?php

namespace App\Http\Logic;

class Validator{

    public static function getUsername($emailAddress){
        $userName = "";

        for ($index = 0; $index < strlen($emailAddress); $index++){
            if ($emailAddress[$index] == "@"){
                break;
            }
            $userName .= $emailAddress[$index];
        }

        return $userName;
    }

}