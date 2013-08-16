<?php

use Kuz\Text;

class Nl2pTest extends PHPUnit_Framework_TestCase
{
    public function testConvertsMultipleLineBreaksToParagraphs()
    {
        $source = "This is paragraph one.\n\nThis is paragraph two.\n\n\nThis is paragraph three.";
        $expected = "<p>This is paragraph one.</p>\n\n<p>This is paragraph two.</p>\n\n<p>This is paragraph three.</p>";

        $this->assertEquals($expected, Text::nl2p($source));
    }

    public function testTrimsWhitespace()
    {
        $source = "\n\n   This is paragraph one.\n  ";
        $expected = '<p>This is paragraph one.</p>';

        $this->assertEquals($expected, Text::nl2p($source));
    }

    public function testConvertsSingleLineBreaksToBrs()
    {
        $source = "This is paragraph one.\n\nThis is paragraph two.\nIt has multiple lines.\nNeat, huh?";
        $expected = "<p>This is paragraph one.</p>\n\n<p>This is paragraph two.<br>\nIt has multiple lines.<br>\nNeat, huh?</p>";

        $this->assertEquals($expected, Text::nl2p($source));

        $expected = "<p>This is paragraph one.</p>\n\n<p>This is paragraph two.<br />\nIt has multiple lines.<br />\nNeat, huh?</p>";

        $this->assertEquals($expected, Text::nl2p($source, true));
    }

    public function testDoesNotFormatEmptyString()
    {
        $source = '   ';
        $expected = '';

        $this->assertEquals($expected, Text::nl2p($source));
    }
}
