<?php
class V0_Topic_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($topicId)
    {
        return Response::eloquent(Topics::get($topicId));
    }
}
