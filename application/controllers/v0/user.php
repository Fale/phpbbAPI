<?php
class V0_User_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($userId = NULL)
    {
        if (!isSet($userId))
        {
            if ($data = User::all())
                foreach ($data as $k => $d)
                    $out[$k] = $d->to_array();
        }
        else
            if ($data = User::find($userId))
                $out = $data->to_array();
        if (isSet($out))
            return Response::json(User::filter($out));
        else
            return Response::json(array('error' => array('message' => 'The requested resource could not be found', 'code' => '404')), '404');
    }
}
