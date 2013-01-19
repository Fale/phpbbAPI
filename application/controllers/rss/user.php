<?php
class RSS_User_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($userId = NULL, $limit = 10)
    {
        $datas = Users::getPosts($userId, $limit);
        $a = 0;
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
