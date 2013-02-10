<?php
class V0_Topic_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($topicId)
    {
        return Response::eloquent(
            Post::query()
                ->where('topic_id','=', $topicId)
                ->where('post_approved','=','1')
                ->order_by('post_time')
                ->get(Post::mask())
        );
    }
}
