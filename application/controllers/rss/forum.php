<?php
class RSS_Forum_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($forumId = NULL, $limit = 10)
    {
        $datas = Post::query()
            ->where('forum_id','=', $forumId)
            ->where('post_approved','=','1')
            ->order_by('post_time', 'desc')
            ->take($limit)
            ->get(Post::mask());
        $a = 0;
        if (!$datas)
            return Response::error('404');
        foreach( $datas as $data)
        {
            $posts[$a] = $data->to_array();
            $a = $a + 1;
        }
        $xml = new Rsss('<rss version="2.0" encoding="utf-8"></rss>');
        $xml->head();
        foreach($posts as $val) {
            $xml->entry($val);
        }
        return $xml->asXML();
    }
}
