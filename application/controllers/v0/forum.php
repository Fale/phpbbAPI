<?php
class V0_Forum_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($forumId = NULL)
    {
        return Response::eloquent(Forums::get($forumId));
    }
}
