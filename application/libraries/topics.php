<?php
class Topics {
    public static function get($topicId, $limit = NULL)
    {
        if( $limit )
        {
            return Post::query()
                ->where('topic_id','=', $topicId)
                ->where('post_approved','=','1')
                ->order_by('post_time')
                ->get(Post::mask());
        }
        else
        {
            return Post::query()
                ->where('topic_id','=', $topicId)
                ->where('post_approved','=','1')
                ->order_by('post_time', 'desc')
                ->take($limit)
                ->get(Post::mask());
        }
    }
}
?>
