<?php
class User extends Eloquent {
    public static $key = 'user_id';

    private static $public = Array(
            'id' => 1, 
            'regdate' => 1, 
            'username' => 1, 
            'posts' => 1, 
            'last_visit' => 1, 
            'last_post' => 1
    );

    private static $private = Array(
            'email' => 1, 
            'birthday' => 1 
    );

    public static function mask()
    {
        return User::$public;
    }
    
    public static function filter($in, $filter = NULL)
    {
        if ($filter == NULL)
            $filter = User::mask();
        if (isSet($in[0]))
        {
            foreach ($in as $k => $i)
                $out[$k] = User::filter($i, $filter);
            return $out;
        }
        $out = Array();
        if (isSet($in['user_id']) && isSet($filter['id']))
            $out['id'] = $in['user_id'];
        if (isSet($in['user_regdate']) && isSet($filter['regdate']))
            $out['regdate'] = $in['user_regdate'];
        if (isSet($in['username']) && isSet($filter['username']))
            $out['username'] = $in['username'];
        if (isSet($in['user_email']) && isSet($filter['email']))
            $out['email'] = $in['user_email'];
        if (isSet($in['user_birthday']) && isSet($filter['birthday']))
            $out['birthday'] = $in['user_birthday'];
        if (isSet($in['user_posts']) && isSet($filter['posts']))
            $out['posts'] = $in['user_posts'];
        if (isSet($in['user_lastvisit']) && isSet($filter['last_visit']))
            $out['last_visit'] = $in['user_lastvisit'];
        if (isSet($in['user_lastpost_time']) && isSet($filter['last_post']))
            $out['last_post'] = $in['user_lastpost_time'];
        return $out;
    }
}
?>
