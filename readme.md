# Kuz Text Utilities

[![Build Status](https://travis-ci.org/akuzemchak/text.png?branch=master)](https://travis-ci.org/akuzemchak/text)

This is a simple PHP class that adds a few helper methods for performing different actions on text. Nothing too fancy, but should be helpful to someone other than me.

## Installation

Use [Composer](http://getcomposer.org/). Seriously.

    $ curl -sS https://getcomposer.org/installer | php
    $ php composer.phar require kuz/text
    $ php composer.phar install

## Kuz\Text::format()

    string Kuz\Text::format( string $subject , array $replacements [, string $prefix = ':'] )

The `Text::format()` method is similar to PHP's native [`sprintf`](http://php.net/sprintf) or [`vsprintf`](http://php.net/vsprintf) functions, but more fun to use.

### Replace named placeholders

    $subject = 'My name is :name, and I am a :title.';
    $replacements = ['name' => 'Aaron', 'title' => 'Code Monkey'];

    echo Kuz\Text::format($subject, $replacements);
    // My name is Aaron, and I am a Code Monkey.

### Replace numeric placeholders

    $subject = 'My name is :0, and I am a :1.';
    $replacements = ['Aaron', 'Code Monkey'];

    echo Kuz\Text::format($subject, $replacements);
    // My name is Aaron, and I am a Code Monkey.

### Replace multiple occurrences

    $subject = ':0 plus :0 equals :1';
    $replacements = [3, 6];

    echo Kuz\Text::format($subject, $replacements);
    // 3 plus 3 equals 6

### Use custom identifiers

    $subject = 'My name is %name, and I am a %title.';
    $replacements = ['name' => 'Aaron', 'title' => 'Code Monkey'];

    echo Kuz\Text::format($subject, $replacements, '%');
    // My name is Aaron, and I am a Code Monkey.

## Kuz\Text::nl2p()

    string Kuz\Text::nl2p( string $text [, bool $xhtml = false] )

The `Text::nl2p()` method takes PHP's [`nl2br`](http://php.net/nl2br) function a step further, by wrapping blocks of text in `<p></p>` tags.

### Basic usage example

    $text = <<<EOD
    Hello.

    This is some placeholder text. It should be a new paragraph.

    As should this.



    As should this.
    But this one has a line break as well.
    EOD;

    echo Kuz\Text::nl2p($text);
    // <p>Hello.</p>
    //
    // <p>This is some placeholder text. It should be a new paragraph.</p>
    //
    // <p>As should this.</p>
    //
    // <p>As should this.<br>
    // But this one has a line break as well.</p>

### Want XHTML style `<br>` tags?

    $text = <<<EOD
    This is a paragraph...
    With a line break!
    EOD;

    echo Kuz\Text::nl2p($text, true);
    // <p>This is a paragraph...<br />
    // With a line break!</p>
