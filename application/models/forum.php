<?php
class Forum extends Eloquent {
    public static $key = 'forum_id';

    private static $public = Array(
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
    );

    private static $private = Array();

    public static function mask()
    {
        return Forum::$public;
    }
}
?>
