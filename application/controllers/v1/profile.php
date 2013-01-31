<?php
class V1_Profile_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($user = NULL)
    {
        if (Auth::check())
        {
            return "You're logged in!";
        }
    }
}
