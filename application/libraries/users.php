<?php
class Users {
    public static function get($userId = NULL)
    {
        if($userId)
        {
            return User::query()
                ->where('user_id','=',$userId)
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

    public static function login($user, $pass)
    {
        $datas = User::query()->where('username','=',$user)->get(array('user_id','user_password'));
        $d = $datas[0]->to_array();
        $userID = $d['user_id'];
        $passHash = $d['user_password'];
        return Login::phpbb_check_hash( $pass, $passHash); 
        
        return "user:$user, pass:$pass, userID: $userID, hash: $passHash";
    }
}
?>
