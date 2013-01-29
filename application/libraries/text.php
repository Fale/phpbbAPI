<?php
class Text {
    public static function toUTF8($text)
    {
        $text = htmlentities($text);
        $text = str_replace("&Atilde;&nbsp;", "&agrave;", $text); // à
        $text = str_replace("&Atilde;&uml;", "&egrave;", $text); // è
        $text = str_replace("&Atilde;&copy;", "&eacute;", $text); // é
        $text = str_replace("&Atilde;&not;", "&igrave;", $text); // ì
        $text = str_replace("&Atilde;&sup2;", "&ograve;", $text); // ò
        $text = str_replace("&Atilde;&sup1;", "&ugrave;", $text); // ù
        return utf8_encode($text);
    }
}
?>
