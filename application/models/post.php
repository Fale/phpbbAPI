<?php
class Post extends Eloquent {
    public static $key = 'post_id';

    private static $public = Array(
        'post_id as id',
        'post_attachment as attachment',
        'post_subject as subject',
        'post_text as text',
        'post_checksum as checksum',
        'forum_id as forum_id',
        'poster_id as poster_id',
        'post_time as time'
    );

    private static $private = Array();

    public static function mask()
    {
        return Post::$public;
    }

    public static function cardinality($postId)
    {
        $topicId = Post::find($postId)->topic_id;
        $before = Post::where('topic_id','=', $topicId)->where('post_approved','=','1')->where('post_id', '<', $postId)->count();
        return $before + 1;
    }

    public static function url($postId)
    {
        $forumId = Post::find($postId)->forum_id;
        $topicId = Post::find($postId)->topic_id;
        $p = Post::cardinality($postId);
        $pager = floor($p/10);
        if ($pager == 0)
            return 'http://forum.viglug.org/viewtopic.php?f=' . $forumId . '&amp;t=' . $topicId . '#p' . $postId;
        else
            return 'http://forum.viglug.org/viewtopic.php?f=' . $forumId . '&amp;t=' . $topicId . '&amp;start=' . $pager*10 . '#p' . $postId;
    }
}
?>
