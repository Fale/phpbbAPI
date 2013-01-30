<?php
class BBCode {

    public static function toStdBBCode($text)
    {
        return preg_replace('/\[(\/?)([^:]*):([^\]]*)\]/i','[$1$2]', $text);
    }

    public static function toStdQuote($text)
    {
        return preg_replace('/\[quote(=?)(&amp;quot;?)([^\]]*)(&amp;quot;?)\]/i','[quote=$3]', $text);
    }

    public static function toHTML($text, $clean = TRUE)
    {
        if ($clean)
            $text = Text::toUTF8($text);
        $text = BBCode::toStdBBCode($text);
        $text = BBCode::toStdQuote($text);
        $parser = new JBBCode\Parser();
        $parser->loadDefaultCodes();
        $parser->addBBCode('quote','<blockquote><p>{param}</p></blockquote>');
        $parser->addBBCode('quote','<b>{option} wrote:</b><blockquote><p>{param}</p></blockquote>', true);
        $parser->addBBCode('code', '<code>{param}</code>', false, false, 1);
        $parser->parse( $text );
        return $parser->getAsHtml();
    }
}
