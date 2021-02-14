<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Logic\AppSession;

class IndexController extends Controller
{
    public function Register($EmailAddress, $Password, $Name, $Username)
    {
        //Check if $mail and $password are empty strings
        if (!$EmailAddress || !$Password || !$Name || !$Username) {
            return json_encode(array("status" => 0, "message" => "All fields are required!"));
        }

        //Encrypt Password
        //$password = Hash::make($Password);
        $password = $Password;

        //Activation Hash
        $activationHash = rand(99999999, 999999999);

        //Check if we have a user
        $results = DB::select("SELECT * FROM users WHERE username = ? OR email_address = ?", [$EmailAddress, $EmailAddress]);

        if (count($results)) {
            return json_encode(array("status" => 0, "message" => "Register with a different username or email address"));
        } else {
            $results = DB::insert('insert into users(
                Id, full_name, username, email_address, passcode, activation_hash, activation_status, user_type
                ) values (
                    0, ?, ?, ?, ?, ?, 0, 0
                    )', [$Name, $Username, $EmailAddress, $password, $activationHash]);

            return json_encode(array("status" => 1, "message" => "Registration was successful. You may login."));
        }
    }

    public function Login($EmailAddress, $Password)
    {

        //Check if we have a user
        $results = DB::select("SELECT * FROM users WHERE username = ? OR email_address = ?", [$EmailAddress, $EmailAddress]);

        if (count($results)) {
            //$comparePassword = Hash::check($P, 'userProfileURL'
            $comparePassword = ($results[0]->passcode == $Password ? 1 : 0);

            if ($comparePassword)
            {
                if (!$results[0]->activation_status) {
                    return json_encode(array("status" => 0, "message" => "You need to activate your email address before you log in!"));
                } else {
                    AppSession::sessionSet($results);
                    return json_encode(array("status" => 1, "message" => "Success"));
                }
            }

            return json_encode(array("status" => 0, "message" => "Email Address or Password incorrect!"));
        } else {
            return json_encode(array("status" => 0, "message" => "Invalid credentials, try again with different credentials!"));
        }
    }

    public function Logout(Request $request)
    {
        // Forget multiple keys...
        $request->session()->forget(['user_info']);
        $request->session()->flush();
        //Redirect to /
        return redirect('/');
    }
}
