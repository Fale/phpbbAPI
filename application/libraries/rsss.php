<?php
class Rsss extends SimpleXMLElement{

    public function head()
    {
        $this->addChild('channel');
        $this->channel->addChild('title', 'ViGLug Forum Posts');
        $this->channel->addChild('link', 'http://rss.forum.viglug.org/');
        $this->channel->addChild('description', 'Latest posts in ViGLug Forum');
        $this->channel->addChild('language', 'it-it');
        $this->channel->addChild('webMaster', 'fabiolocati@gmail.com');
        $this->channel->addChild('generator', 'PHPbbAPI');
        $this->channel->addChild('docs', 'http://www.viglug.org');
        $this->channel->addChild('pubDate', date(DATE_RSS));
    }

    public function entry($val)
    {
        $item = $this->channel->addChild('item'); 
        $item->addChild('title', htmlentities($val['subject'])); 
        $item->addChild('link', $this->generateUrl($val));
        $item->addChild('description', $this->generateText($val)); 
        $item->addChild('pubDate', date(DATE_RSS, $val['time'])); 
    }

    private function generateText($val)
    {
        $text = htmlentities($val['text']);
        // Lists
        $text = str_replace("[list=1:259zw1au]", "&lt;ul&gt;", $text);
        $text = str_replace("[*:259zw1au]", "&lt;li&gt;", $text);
        $text = str_replace("[/*:m:259zw1au]", "&lt;/li&gt;", $text);
        $text = str_replace("[/list:o:259zw1au]", "&lt;/ul&gt;", $text);
        // Lists ordered
        $text = str_replace("[list=1:31vsco5w]", "&lt;ol&gt;", $text);
        $text = str_replace("[*:31vsco5w]", "&lt;li&gt;", $text);
        $text = str_replace("[/*:m:31vsco5w]", "&lt;/li&gt;", $text);
        $text = str_replace("[/list:o:31vsco5w]", "&lt;/ol&gt;", $text);
        // Italic
        $text = str_replace("[i:259zw1au]", "&lt;i&gt;", $text);
        $text = str_replace("[/i:259zw1au]", "&lt;/i&gt;", $text);
        // Accented letters
        $text = str_replace("&Atilde;&sup1;", "&ugrave;", $text); // ù
        return $text;
    }

    private function generateUrl($val)
    {
        return 'http://forum.viglug.org/viewtopic.php?f=' . $val['forum_id'] . '&amp;t=' . $val['topic_id'] . '#p' . $val['id'];
    }
}
?>
