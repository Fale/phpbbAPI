<?php
class V0_Forum_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($forumId = NULL)
    {
        if($forumId)
            return Response::eloquent(
                Topic::query()
                    ->where('forum_id','=', $forumId)
                    ->where('topic_approved','=','1')
                    ->order_by('topic_last_post_time', 'desc')
                    ->get(Topic::mask())
            );
        else
            return Response::eloquent(
                Forum::query()
                    ->order_by('left_id')
                    ->get(Forum::mask())
            );
    }
}
