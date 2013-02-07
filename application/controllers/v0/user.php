<?php
class V0_User_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($userId = NULL)
    {
        if (!isSet($userId))
            $out = User::get(User::mask());
        else
            $out = User::find($userId, User::mask());
        if (isSet($out))
            return Response::eloquent($out);
        else
            return Response::json(array('error' => array('message' => 'The requested resource could not be found', 'code' => '404')), '404');
    }
}
