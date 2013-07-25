<?php

use Kuz\Text;

class FormatTest extends PHPUnit_Framework_TestCase
{
    public function testReplaceNamedValues()
    {
        $subject = 'My name is :name, and I am a :title';
        $replacements = array(
            'name' => 'Aaron',
            'title' => 'Code Monkey',
        );
        $expected = 'My name is Aaron, and I am a Code Monkey';

        $this->assertEquals($expected, Text::format($subject, $replacements));
    }

    public function testReplaceNumberedValues()
    {
        $subject = 'My name is :0, and I am a :1';
        $replacements = array(
            'Aaron',
            'Code Monkey',
        );
        $expected = 'My name is Aaron, and I am a Code Monkey';

        $this->assertEquals($expected, Text::format($subject, $replacements));
    }
}
