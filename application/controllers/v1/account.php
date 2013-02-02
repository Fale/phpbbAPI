<?php
class V1_Account_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($data = NULL)
    {
        if (is_null($data))
            return User::query()
                ->where('user_id','=',$userId)
                ->get(
                    array(
                        'user_id as id',
                        'user_regdate as regdate',
                        'username as username',
                        'user_email as email',
                        'user_birthday as birthday',
                        'user_posts as posts',
                        'user_lastvisit as last_visit',
                        'user_lastpost_time as last_post'
                    )
                );
        else
            switch($data) {
                case "id":
                    $response = Auth::user();
                    break;
                case "username":
                    $response = User::find(Auth::user())->username;
                    break;
                case "regdate":
                    $response = User::find(Auth::user())->user_regdate;
                    break;
                case "email":
                    $response = User::find(Auth::user())->user_email;
                    break;
                case "birthday":
                    $response = User::find(Auth::user())->user_birthday;
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
