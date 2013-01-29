<?php
class BBCode {

    public static function toStdBBCode($text)
    {
        return preg_replace('/\[(\/?)([^:]*):([^\]]*)\]/i','[$1$2]', $text);
    }

}
