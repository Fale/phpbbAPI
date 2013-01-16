<?php
class Stats {
    public static function get($object)
    {
        $output = Array();
        if( !$object || $object == "posts")
            $output = array_merge( $output, Array("posts" => Post::query()->count()));
        if( !$object || $object == "users")
            $output = array_merge( $output, Array("users" => User::query()->count()));
        if( !$object || $object == "topics")
            $output = array_merge( $output, Array("topics" => Topic::query()->count()));
        return $output;
    }
}
?>
