<?php
class Topic extends Eloquent {
    public static $key = 'topic_id';

    private static $public = Array(
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
    );

    private static $private = Array();

    public static function mask()
    {
        return Topic::$public;
    }
}
?>
