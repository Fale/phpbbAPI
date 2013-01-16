<?php
class RSS_Index_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($forumId = NULL)
    {
        $test_array = array (
            'bla' => 'blub',
            'foo' => 'bar',
            'another_array' => array (
                'stack' => 'overflow',
            ),
        );
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
        array_walk_recursive($test_array, array ($xml, 'addChild'));
        return $xml->asXML();
    }
}
