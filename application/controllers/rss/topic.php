<?php
class RSS_Topic_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($topicId = NULL, $limit = 10)
    {
        $datas = Topics::get($topicId, $limit);
        $a = 0;
        foreach( $datas as $data)
        {
            $posts[$a] = $data->to_array();
            $posts[$a]['topic_id'] = $topicId;
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
