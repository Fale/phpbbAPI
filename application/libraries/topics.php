<?php
class Topics {
    public static function get($topicId)
    {
        return Topic::query()
            ->where('topic_id','=', $topicId)
            ->where('post_approved','=','1')
            ->order_by('post_time')
            ->get(
                array(
                    'post_id as id',
                    'post_attachment as attachment',
                    'post_text as text',
                    'post_checksum as checksum',
                    'poster_id as poster_id',
                    'post_time as post_time'
                )
            );
    }
}
?>
