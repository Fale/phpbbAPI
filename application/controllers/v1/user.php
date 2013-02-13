<?php
class V1_User_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index()
    {
        return Response::eloquent(User::get(User::mask()));
    }

    public function get_user($id = NULL)
    {
        if ($id == NULL)
            $id = Auth::user();
        if ($data = Input::get('fields'))
            $data = array_fill_keys(explode(",", $data), 1);
        $response = User::find($id, User::mask($data));
        if (isSet($response))
            return Response::eloquent($response, '200');
        else
            return Response::json(array('error' => array('message' => 'The requested resource could not be found', 'code' => '404')), '404');
    }

    public function post_user()
    {
        $data = Array();
        $data['username'] = Input::get('user');
        $data['password'] = Input::get('pass');
        $data['email'] = Input::get('email');
        if (Auth::register($data))
            return Response::eloquent($response, '200');
        else
            return Response::json(array('error' => array('message' => 'The requested resource could not be found', 'code' => '404')), '404');
    }

    public function post_login()
    {
        $user = Input::get('user');
        $pass = Input::get('pass');
        $array = Array('username' => $user, 'password' => $pass);
        if (Auth::attempt($array))
            return Response::json( array( 'message' => 'Authentication Successful', 'code' => '230'), '200');
        else
            return Response::json( array( 'error' => array( 'message' => 'Access denied', 'code' => '531')), '500');
    }
}
