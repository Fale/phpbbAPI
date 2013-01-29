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
        return $text;
    }
}
