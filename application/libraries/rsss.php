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
        $item->addChild('author', $this->fetchPoster($val['poster_id']));
        $item->addChild('description', Texts::toUTF8($val['text'])); 
        $item->addChild('pubDate', date(DATE_RSS, $val['time'])); 
    }

    private function fetchPoster($poster_id)
    {
        $datas = User::query()->where('user_id','=',$poster_id)->get(array('username'));
        return $datas[0]->to_array()['username'];
    }

    private function getPostOrd($postId)
    {
        $topics = Post::query()->where('post_id','=',$postId)->get(array('topic_id'));
        $topicId = $topics[0]->to_array()['topic_id'];
        $posts = Post::query()
            ->where('topic_id','=', $topicId)
            ->where('post_approved','=','1')
            ->order_by('post_time')
            ->get(
                array('post_id')
            );
        $a = 0;
        foreach( $posts as $post)
        {
            $ps[$a] = $post->to_array();
            $a = $a + 1;
            if( $ps[$a-1]['post_id'] == $postId )
                return $a;
        }
    }

    private function generateUrl($val)
    {
        $p = $this->getPostOrd($val['id']);
        $pager = floor($p/10);
        if($pager == 0)
            return 'http://forum.viglug.org/viewtopic.php?f=' . $val['forum_id'] . '&amp;t=' . $val['topic_id'] . '#p' . $val['id'];
        else
            return 'http://forum.viglug.org/viewtopic.php?f=' . $val['forum_id'] . '&amp;t=' . $val['topic_id'] . '&amp;start=' . $pager*10 . '#p' . $val['id'];
    }
}
?>
