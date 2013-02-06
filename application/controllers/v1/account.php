<?php
class V1_Account_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($id = NULL)
    {
        if ($id == NULL)
            $id = Auth::user();
        $datas = Input::get('fields');
        if (!empty($datas))
            $datas = explode(",", $datas);
        $db = User::find($id)->to_array();
        $parsed['id'] = $db['user_id'];
        $parsed['regdate'] = $db['user_regdate'];
        $parsed['username'] = $db['username'];
        $parsed['email'] = $db['user_email'];
        $parsed['birthday'] = $db['user_birthday'];
        $parsed['posts'] = $db['user_posts'];
        $parsed['last_visit'] = $db['user_lastvisit'];
        $parsed['last_post'] = $db['user_lastpost_time'];
        if (!is_array($datas))
            $response = $parsed;
        else
            foreach ($datas as $data)
            {
                $response[$data] = $parsed[$data];
            }
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
