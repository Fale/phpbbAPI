<?php
class Post extends Eloquent {
    public static $key = 'post_id';

    public static function cardinality($postId)
    {
        $topicId = Post::find($postId)->topic_id;
        $before = Post::where('topic_id','=', $topicId)->where('post_approved','=','1')->where('post_id', '<', $postId)->count();
        return $before + 1;
    }

}
?>
