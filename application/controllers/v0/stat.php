<?php
class V0_Stat_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($object = NULL)
    {
        $output = Array();
        if( !$object || $object == "posts")
            $output = array_merge( $output, Array("posts" => Post::query()->count()));
        if( !$object || $object == "users")
            $output = array_merge( $output, Array("users" => User::query()->count()));
        if( !$object || $object == "topics")
            $output = array_merge( $output, Array("topics" => Topic::query()->count()));
        if( !$object || $object == "most-replied-topic")
        {
            $t = Topic::query()->order_by('topic_replies','desc')->take(1)->get('topic_id');
            $temp = Array("most-replied-topic" => $t['0']->to_array()['topic_id']);
            $output = array_merge( $output, $temp);
        }
        if( !$object || $object == "forums")
            $output = array_merge( $output, Array("forums" => Forum::query()->count()));
        return "[" . json_encode($output) . "]";
    }
}
