<?php
class V1_Account_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($data = NULL)
    {
        return "Your profile";
    }

    public function post_login()
    {
        $user = Input::get('user');
        $pass = Input::get('pass');
        $array = Array('username' => $user, 'password' => $pass);
        if (Auth::attempt($array))
            return Response::json( array( 'success' => array( 'message' => 'Authentication Successful', 'code' => '230')), '230');
        else
            return Response::json( array( 'error' => array( 'message' => 'Access denied', 'code' => '531')), '531');
    }
}
