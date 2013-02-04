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
        $item->addChild('author', User::find($val['poster_id'])->username);
        $item->addChild('description', BBCode::toHTML($val['text'])); 
        $item->addChild('pubDate', date(DATE_RSS, $val['time'])); 
    }

    private function generateUrl($val)
    {
        $p = Post::cardinality($val['id']);
        $pager = floor($p/10);
        if($pager == 0)
            return 'http://forum.viglug.org/viewtopic.php?f=' . $val['forum_id'] . '&amp;t=' . $val['topic_id'] . '#p' . $val['id'];
        else
            return 'http://forum.viglug.org/viewtopic.php?f=' . $val['forum_id'] . '&amp;t=' . $val['topic_id'] . '&amp;start=' . $pager*10 . '#p' . $val['id'];
    }
}
?>
