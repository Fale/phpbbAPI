<?php
class Users {
    public static function getPosts($userId, $limit = 10)
    {
        return Post::query()
            ->where('poster_id','=', $userId)
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
                    'poster_id as poster_id',
                    'post_time as time'
                )
            );
    }
}
?>
