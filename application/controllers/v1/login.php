<?php
class V1_Login_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($user, $pass)
    {
        $array = Array('username' => $user, 'password' => $pass);
        if (Auth::attempt($array))
            return "You're logged in!";
        else
            return "Auth error!";
    }
}
