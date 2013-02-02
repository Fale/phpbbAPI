<?php
class V1_Account_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($data = NULL)
    {
        if (is_null($data))
            return "Your profile";
        else
            switch($data) {
                case "username":
                    $response = User::find(Auth::user())->username;
                    break;
            }
        if ($response)
            return Response::json(array('success' => array($data => $response)), '200');
        else
            return Response::json(array('error' => array('message' => 'The requested resource could not be found', 'code' => '404')), '404');
    }

    public function post_login()
    {
        $user = Input::get('user');
        $pass = Input::get('pass');
        $array = Array('username' => $user, 'password' => $pass);
        if (Auth::attempt($array))
            return Response::json( array( 'success' => array( 'message' => 'Authentication Successful', 'code' => '230')), '200');
        else
            return Response::json( array( 'error' => array( 'message' => 'Access denied', 'code' => '531')), '500');
    }
}
