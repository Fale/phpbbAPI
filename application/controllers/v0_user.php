<?php
class V0_User_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($userId = NULL)
    {
        return Response::eloquent(Users::get($userId));
    }
}
