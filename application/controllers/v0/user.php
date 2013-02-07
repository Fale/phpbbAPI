<?php
class V0_User_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($userId = NULL)
    {
        if (!isSet($userId))
            $data = User::all();
        else
            $data = User::find($userId);
        if ($data)
            return Response::json(User::filter($data->to_array()));
        else
            return Response::json(array('error' => array('message' => 'The requested resource could not be found', 'code' => '404')), '404');
    }
}
