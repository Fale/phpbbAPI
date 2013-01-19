<?php
class RSS_Index_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index( $limit = 10)
    {
        $datas = Forums::getPosts(NULL, $limit);
        $a = 0;
        foreach( $datas as $data)
        {
            $posts[$a] = $data->to_array();
            $a = $a + 1;
        }
        $xml = new Rsss('<rss version="2.0" encoding="utf-8"></rss>');
        $xml->head();
        foreach( $posts as $val) {
            $xml->entry($val);
        }
        return $xml->asXML();
    }
}
