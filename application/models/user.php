<?php
class User extends Eloquent {
    public static $key = 'user_id';

    private static $public = Array(
            'user_id as id',
            'user_regdate as regdate',
            'username',
            'user_posts as posts',
            'user_lastvisit as last_visit',
            'user_lastpost_time as last_post_time'
    );

    private static $private = Array(
            'user_email as email',
            'user_birthday as birthday'
    );

    public static function mask()
    {
        return User::$public;
    }
}
?>
