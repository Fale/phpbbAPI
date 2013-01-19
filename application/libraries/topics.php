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
                ->get(
                    array(
                        'post_id as id',
                        'post_attachment as attachment',
                        'post_subject as subject',
                        'post_text as text',
                        'post_checksum as checksum',
                        'forum_id as forum_id',
                        'poster_id as poster_id',
                        'post_time as time'
                    )
                );
        }
        else
        {
            return Post::query()
                ->where('topic_id','=', $topicId)
                ->where('post_approved','=','1')
                ->order_by('post_time', 'desc')
                ->take($limit)
                ->get(
                    array(
                        'post_id as id',
                        'post_attachment as attachment',
                        'post_subject as subject',
                        'post_text as text',
                        'post_checksum as checksum',
                        'forum_id as forum_id',
                        'poster_id as poster_id',
                        'post_time as time'
                    )
                );
        }
    }
}
?>
