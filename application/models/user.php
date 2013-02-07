<?php
class User extends Eloquent {
    public static $key = 'user_id';

    private static $public = Array(
            'user_id as id',
            'user_regdate as regdate',
            'username as username',
            'user_posts as posts',
            'user_lastvisit as last_visit',
            'user_lastpost_time as last_post_time'
    );

    private static $private = Array(
            'user_email as email',
            'user_birthday as birthday'
    );

    public static function mask($filters = NULL)
    {
        if (Auth::check())
            $out = array_merge (User::$public, User::$private);
        else
            $out = User::$public;
        if ($filters)
        {
            $clean = Array();
            foreach ($out as $o)
            {
                $check = explode (" ", $o);
                foreach ($filters as $k => $filter)
                    if ($check[2] == $k)
                        $clean[] = $o;
            }
            $out = $clean;
        }
        return $out;
    }
}
?>
