<?php
class Forums {
    public static function get($forumId = NULL)
    {
        if($forumId)
        {
            return Topic::query()
                ->where('forum_id','=', $forumId)
                ->where('topic_approved','=','1')
                ->order_by('topic_last_post_time', 'desc')
                ->get(
                    array(
                        'topic_id as id',
                        'topic_attachment as attachment',
                        'topic_title as title',
                        'topic_views as views',
                        'topic_replies as topic_replies',
                        'topic_first_poster_name as first_poster',
                        'topic_poster as first_poster_id',
                        'topic_time as first_post_time',
                        'topic_last_poster_name as last_poster',
                        'topic_last_poster_id as last_poster_id',
                        'topic_last_post_time as last_post_time'
                    )
                );
        }
        else
        {
            return Forum::query()
                ->order_by('left_id')
                ->get(
                    array(
                        'forum_id as id',
                        'left_id as order',
                        'forum_name as name',
                        'forum_desc as desc',
                        'forum_posts as posts',
                        'forum_topics as topics',
                        'forum_last_post_id as last_post_id',
                        'forum_last_post_time as last_post_time',
                        'forum_last_post_subject as last_post_topic',
                        'forum_last_poster_name as last_poster',
                        'forum_last_poster_id as last_poster_id'
                    )
                );
        }
    }

    public static function getPosts($forumId = NULL, $limit = 10)
    {
        if( $forumId )
        {
            return Post::query()
                ->where('forum_id','=', $forumId)
                ->where('post_approved','=','1')
                ->order_by('post_time', 'desc')
                ->take($limit)
                ->get(
                    array(
                        'post_id as id',
                        'post_attachment as attachment',
                        'post_text as text',
                        'post_subject as subject',
                        'post_checksum as checksum',
                        'topic_id as topic_id',
                        'forum_id as forum_id',
                        'post_time as time'
                    )
                );
        }
        else
        {
            return Post::query()
                ->where('post_approved','=','1')
                ->order_by('post_time', 'desc')
                ->take($limit)
                ->get(
                    array(
                        'post_id as id',
                        'post_attachment as attachment',
                        'post_text as text',
                        'post_subject as subject',
                        'post_checksum as checksum',
                        'topic_id as topic_id',
                        'forum_id as forum_id',
                        'post_time as time'
                    )
                );
        }
    }

}
?>
