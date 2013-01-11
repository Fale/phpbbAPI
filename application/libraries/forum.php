<?php
class Forums {
    public static function get()
    {
        return Response::eloquent(
            Forum::query()
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
                )
        );
    }
}
?>
