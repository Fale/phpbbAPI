<?php
class BBCode {

    public static function toStdBBCode($text)
    {
        return preg_replace('/\[(\/?)([^:]*):([^\]]*)\]/i','[$1$2]', $text);
    }

    public static function toHTML($text, $clean = TRUE)
    {
        if ($clean)
            $text = Text::toUTF8($text);
        $text = BBCode::toStdBBCode($text);

        $parser = new JBBCode\Parser();
        $parser->loadDefaultCodes();
        $parser->addBBCode('quote','<blockquote><p>{param}</p></blockquote>');
        $parser->addBBCode('quote','{option} wrote:<blockquote><p>{param}</p></blockquote>', true);
        $parser->addBBCode('code', '<code>{param}</code>', false, false, 1);
        $parser->parse( $text );
        return $parser->getAsHtml();
    }
}
