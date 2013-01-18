<?php
class RSS_Forum_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($forumId = NULL, $limit = 10)
    {
        $datas = Forums::getPosts($forumId, $limit);
        $a = 0;
        foreach( $datas as $data)
        {
            $posts[$a] = $data->to_array();
            $a = $a + 1;
        }
        $xml = new SimpleXMLElement('<rss version="2.0" encoding="utf-8"></rss>');
        $xml->addChild('channel'); 
        $xml->channel->addChild('title', 'ViGLug Forum Posts'); 
        $xml->channel->addChild('link', 'http://rss.forum.viglug.org/'); 
        $xml->channel->addChild('description', 'Latest posts in ViGLug Forum');
        $xml->channel->addChild('language', 'it-it'); 
        $xml->channel->addChild('webMaster', 'fabiolocati@gmail.com');
        $xml->channel->addChild('generator', 'PHPbbAPI');
        $xml->channel->addChild('docs', 'http://www.viglug.org');
        $xml->channel->addChild('pubDate', date(DATE_RSS)); 

        foreach( $posts as $post) {
            $item = $xml->channel->addChild('item'); 
            $item->addChild('title', htmlentities($post['subject'])); 
            $item->addChild('link', 'http://forum.viglug.org/viewtopic.php?t=' . $post['topic_id'] . '#p' . $post['id']);
            $item->addChild('description', htmlentities($post['text'])); 
            $item->addChild('pubDate', date(DATE_RSS, $post['time'])); 
        }
        return $xml->asXML();
    }
}
