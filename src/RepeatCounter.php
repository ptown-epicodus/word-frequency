<?php
class RepeatCounter
{
    public $whitespace = [
        ' ',
        "\t",
        "\n"
    ];  // PHP < 5.6 does not allow class constants to store arrays

    function CountRepeats($word, $sample)
    {
        $beggining_of_word = true; // Flags that we are at string boundary
        $word = strtolower($word);
        $sample = strtolower($sample);


        for ($i = 0; $i < strlen($sample); $i++) {
            $sample_char = $sample{$i};

            if ($beggining_of_word) {
              if ($word{0} == $sample_char) {
                  if ($this->recursivelyMatchRestOfWord(substr($word, 1), substr($sample, $i + 1)))
                      return true;
              }
            }
            $beggining_of_word = false;
            while (! $this->isDelimitter($sample_char)) {
              $i++;
              $sample_char = $sample{$i};
            }

            if ($word{0} == $sample_char) {
                if ($this->recursivelyMatchRestOfWord(substr($word, 1), substr($sample, $i + 1)))
                    return true;
            }
        }
        return false;
    }

    function recursivelyMatchRestOfWord($word, $sample)
    {
        if ($word == '' && $this->isDelimitter($sample{0}))
            return true;
        if ($sample == '')
            return false;
        if ($word{0} != $sample{0})
            return false;
        return $this->recursivelyMatchRestOfWord(substr($word, 1), substr($sample, 1));
    }

    function isDelimitter($letter)
    {
        if ($letter == '')
            return true;
        return in_array($letter{0}, $this->whitespace);
    }
}
?>
