<?php
class V1_User_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index()
    {
        foreach (User::all() as $k => $d)
            $out[$k] = $d->to_array();
        return Response::json(User::filter($out));
    }

    public function get_user($id = NULL)
    {
        if ($id == NULL)
            $id = Auth::user();
        if ($data = Input::get('fields'))
            $data = array_fill_keys(explode(",", $data), 1);
        $response = User::filter(User::find($id)->to_array(), $data);
        if (isSet($response))
            return Response::json($response, '200');
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
