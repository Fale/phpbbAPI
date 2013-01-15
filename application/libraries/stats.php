<?php
class Stats {
    public static function get($object)
    {
        if( !$object && $object = "posts")
        {
                return array("posts" => Post::query()->count());
        }
    }
}
?>
