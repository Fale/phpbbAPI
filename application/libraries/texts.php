<?php
class Texts {
    public static function toUTF8($text)
    {
        $text = htmlentities($text);
        // Fix citations
        $text = preg_replace('/\[quote=&amp;quot;(.*)&amp;quot;:(.*)\](.*)[ ?]\[\/quote:\2\]/i','"$3" ($1)', $text);
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
