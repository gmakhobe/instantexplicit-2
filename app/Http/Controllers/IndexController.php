<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Logic\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function Register($EmailAddress, $Password, $Name, $Username)
    {
        //Check if $mail and $password are empty strings
        if (!$EmailAddress || !$Password || !$Name || !$Username)
        {
            return json_encode(array("status" => 0, "message" => "All fields are required!"));
        }
        //Make username
        $username = Validator::getUsername($EmailAddress);
        //Hash Password
        //try{
            $password = Hash::make($Password);

            //Activation Hash
            $activationHash = rand(99999999, 999999999);

            // Insert into the database
            DB::insert('insert into users(UserId, Name, Surname, EmailAddress, Passcode, ActivationHash, Username, AccountActive) values (0, ?, ?, ?, ?, ?, ?, ?)', [$Name, $Username, $EmailAddress, $Password, $activationHash, "No"]);  

            //$mailArg = array("Name"=> $Name, "Surname"=> $surname, "ActivatioHash"=> $activationHash);
            //Send email to client
            //Mail::to($email)
            //    ->send(new Registration($mailArg));

            return json_encode(array("status" => 1, "message" => "User successfully registered"));
        //}catch(Exception $e){
        //    return json_encode(array("status" => 0, "message" => "An error occured please try again"));
        //}
    }
}
