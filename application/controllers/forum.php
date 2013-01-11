<?php
class Forum_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($number = NULL)
    {
        return Response::eloquent(Forum::get());
    }
}
