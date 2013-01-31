<?php
class V0_Login_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($user, $pass)
    {
        $array = Array('username' => $user, 'password' => $pass);
        return Auth::attempt($array);
    }
}
