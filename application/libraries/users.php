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
}
?>
