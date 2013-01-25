<?php
class Texts {

    public static function toStdBBCode($text)
    {
        return preg_replace('/\[(\/?)([^:]*):([^\]]*)\]/i','[$1$2]', $text);
    }

    public static function toUTF8($text)
    {
        $text = htmlentities($text);
        // First bbcode cleanup
        $text = Texts::toStdBBCode($text);
        // Fix citations
        $text = preg_replace('/\[quote=&amp;quot;(.*?)&amp;quot;\](.*)\[\/quote\]/is','"$2" ($1)', $text);
        // Lists ordered
        $text = str_replace("[list=1]", "&lt;ol&gt;", $text);
        $text = str_replace("[*]", "&lt;li&gt;", $text);
        $text = str_replace("[/*]", "&lt;/li&gt;", $text);
        $text = str_replace("[/list]", "&lt;/ol&gt;", $text);
        // URL
        $text = preg_replace('/\[url=(.*):(.*)\](.*)\[\/url:(.*)\]/i','<a href="$1">$3</a>', $text);
        // Italic
        $text = preg_replace('/\[i:(.*)\](.*)\[\/i:(.*)\]/i','<i>$2</i>', $text);
        // Bold
        $text = preg_replace('/\[b:(.*)\](.*)\[\/b:(.*)\]/i','<strong>$2</strong>', $text);
        // Code
        $text = str_replace("[code:180ywoqp]", "&lt;code&gt;", $text);
        $text = str_replace("[/code:180ywoqp]", "&lt;/code&gt;", $text);
        // emoticons
        $text = str_replace("{SMILIES_PATH}", "http://forum.viglug.org/images/smilies", $text);
        // Accented letters
        $text = str_replace("&Atilde;&nbsp;", "&agrave;", $text); // à
        $text = str_replace("&Atilde;&uml;", "&egrave;", $text); // è
        $text = str_replace("&Atilde;&copy;", "&eacute;", $text); // é
        $text = str_replace("&Atilde;&not;", "&igrave;", $text); // ì
        $text = str_replace("&Atilde;&sup2;", "&ograve;", $text); // ò
        $text = str_replace("&Atilde;&sup1;", "&ugrave;", $text); // ù
        $text = utf8_encode($text);
        return $text;
    }
}
?>
