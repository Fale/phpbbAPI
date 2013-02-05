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
        if (!is_array($datas))
        {
            $data = User::find($id)->to_array();
            $response['id'] = $data['user_id'];
            $response['regdate'] = $data['user_regdate'];
            $response['username'] = $data['username'];
            $response['email'] = $data['user_email'];
            $response['birthday'] = $data['user_birthday'];
            $response['posts'] = $data['user_posts'];
            $response['last_visit'] = $data['user_lastvisit'];
            $response['last_post'] = $data['user_lastpost_time'];
        }
        else
        {
            foreach ($datas as $data)
            {
                switch ($data) {
                    case "id":
                        $response[$data] = $id;
                        break;
                    case "username":
                        $response[$data] = User::find($id)->username;
                        break;
                    case "regdate":
                        $response[$data] = User::find($id)->user_regdate;
                        break;
                    case "email":
                        $response[$data] = User::find($id)->user_email;
                        break;
                    case "birthday":
                        $response[$data] = User::find($id)->user_birthday;
                        break;
                    case "posts":
                        $response[$data] = User::find($id)->user_posts;
                        break;
                    case "last_visit":
                        $response[$data] = User::find($id)->user_lastvisit;
                        break;
                    case "last_post":
                        $response[$data] = User::find($id)->user_lastpost_time;
                        break;
                }
            }
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
