# Kuz Text Utilities

This is a simple PHP class that adds a few helper methods for performing different actions on text. Nothing too fancy, but should be helpful to someone other than me.

## Installation

Use [Composer](http://getcomposer.org/). Seriously.

    $ curl -sS https://getcomposer.org/installer | php
    $ php composer.phar require kuz/text
    $ php composer.phar install

## Kuz\Text::format()

The `Text::format()` method is similar to PHP's native `sprintf` or `vsprintf` functions, but more fun to use.

    string Kuz\Text::format(string $subject , array $replacements [, string $prefix = ':'])

### Replace named placeholders

    $subject = 'My name is :name, and I am a :title.';
    $replacements = ['name' => 'Aaron', 'title' => 'Code Monkey'];

    // My name is Aaron, and I am a Code Monkey.
    echo Kuz\Text::format($subject, $replacements);

### Replace numeric placeholders

    $subject = 'My name is :0, and I am a :1.';
    $replacements = ['Aaron', 'Code Monkey'];

    // My name is Aaron, and I am a Code Monkey.
    echo Kuz\Text::format($subject, $replacements);

### Replace multiple occurrences

    $subject = ':num plus :num equals :total';
    $replacements = [3, 6];

    // 3 plus 3 equals 6
    echo Kuz\Text::format($subject, $replacements);

### Use custom identifiers

    $subject = 'My name is %name, and I am a %title.';
    $replacements = ['name' => 'Aaron', 'title' => 'Code Monkey'];

    // My name is Aaron, and I am a Code Monkey.
    echo Kuz\Text::format($subject, $replacements, '%');

## Kuz\Text::nl2p()

The `Text::nl2p()` method takes PHP's `nl2br` function a step further, by wrapping blocks of text in `<p></p>` tags.

    string Kuz\Text::nl2p(string $text [, bool $xhtml = false])

### Basic usage example

    $text = <<<EOD
    Hello.

    This is some placeholder text. It should be a new paragraph.



    As should this.





    As should this.
    But this one has a line break as well.
    EOD;

    // <p>Hello.</p>
    //
    // <p>This is some placeholder text. It should be a new paragraph.</p>
    //
    // <p>As should this.</p>
    //
    // <p>As should this.<br>
    // But this one has a line break as well.</p>
    echo Kuz\Text::nl2p($text);

### Want XHTML style `<br>` tags?

    $text = <<<EOD
    This is a paragraph...
    With a line break!
    EOD;

    // <p>This is a paragraph...<br />
    // With a line break!</p>
    echo Kuz\Text::nl2p($text, true);
