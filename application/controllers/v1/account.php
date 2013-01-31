<?php
class V1_Account_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index()
    {
        return "Your profile";
    }

    public function post_login()
    {
        $user = Input::get('user');
        $pass = Input::get('pass');
        $array = Array('username' => $user, 'password' => $pass);
        if (Auth::attempt($array))
            return "You're logged in!";
        else
            return "Auth error!";
    }
}
