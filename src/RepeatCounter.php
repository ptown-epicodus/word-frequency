<?php
class RepeatCounter
{
    public $punctuation = [
        ' ',
        "\t",
        "\n",
        '!',
        '@',
        '#',
        '$',
        '%',
        '^',
        '&',
        '*',
        '(',
        ')',
        '{',
        '}',
        '[',
        ']',
        '\\',
        '|',
        '/',
        '?',
        ',',
        '.',
        '<',
        '>',
        '`',
        '~',
        '-',
        '_',
        '=',
        '+',
        ';',
        ':',
        '\'',
        '"',
    ];  // PHP < 5.6 does not allow class constants to store arrays

    function CountRepeats($word, $sample)
    {
        $word = strtolower($word);
        $sample = strtolower($sample);

        $repeat_count = 0;

        for ($i = 0; $i < strlen($sample); $i++) {
            $sample_char = $sample{$i};
            if ($word{0} == $sample_char) {
                if ($this->recursivelyMatchRestOfWord(substr($word, 1), substr($sample, $i + 1))) {
                    $repeat_count++;
                    $i += strlen($word) - 1;
                    continue;
                }
            }
            while (! $this->isDelimiter($sample_char)) {
                $i++;
                $sample_char = $sample{$i};
            }
        }

        return $repeat_count;
    }

    function recursivelyMatchRestOfWord($word, $sample)
    {
        if ($word == '' && $this->isDelimiter($sample{0}))
            return true;
        if ($sample == '')
            return false;
        if ($word{0} != $sample{0})
            return false;
        return $this->recursivelyMatchRestOfWord(substr($word, 1), substr($sample, 1));
    }

    function isDelimiter($letter)
    {
        if ($letter == '')
            return true;
        return in_array($letter{0}, $this->punctuation);
    }
}
?>
