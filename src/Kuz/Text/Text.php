<?php

namespace Kuz\Text;

class Text
{
    /**
     * Format a string by replacing placeholder values
     *
     * @param   string  $subject
     * @param   array   $replacements
     * @param   string  $prefix
     * @return  string
     */
    public static function format($subject, array $replacements, $prefix = ':')
    {
        // Replace each key with the value
        foreach ($replacements as $key => $value) {
            $subject = str_replace($prefix.$key, $value, $subject);
        }

        return $subject;
    }

    /**
     * Convert line breaks into <p> and <br> tags
     *
     * @param   string  $text
     * @param   string  $xhtml
     * @return  string
     */
    public static function nl2p($text, $xhtml = false)
    {
        // Remove non-Unix line breaks
        $text = str_replace("\r\n", "\n", $text);

        // Split into fragments
        $fragments = preg_split("/\n{2,}/", trim($text));

        // Generate paragraphs and breaks
        $fragments = array_map(function ($fragment) use ($xhtml) {
            return '<p>' . nl2br($fragment, $xhtml) . '</p>';
        }, $fragments);

        return implode("\n\n", $fragments);
    }
}
