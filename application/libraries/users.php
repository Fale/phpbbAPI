<?php
class Users {
    public static function get($userId)
    {
        if($userId)
        {
            return array($userId);
        }
        else
        {
            return User::query()
                ->where('user_password','!=','')
                ->order_by('user_id')
                ->get(
                    array(
                        'user_id as id',
                        'user_regdate as regdate',
                        'username as name',
                        'user_posts as posts',
                        'user_lastvisit as last_visit',
                        'user_lastpost_time as last_post'
                    )
                );
        }
    }
    
    public static function getPosts($userId)
    {
        return Post::query()
            ->where('poster_id','=', $userId)
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
