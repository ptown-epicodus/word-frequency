<?php
class RepeatCounter
{
    function CountRepeats($word, $sample)
    {
        $word = strtolower($word);
        $sample = strtolower($sample);

        for ($i = 0; $i < strlen($sample); $i++) {
            $sample_char = $sample{$i};
            if ($word{0} == $sample_char) {
                if ($this->recursivelyMatchRestOfWord(substr($word, 1), substr($sample, $i + 1)))
                    return true;
            }
        }
        return false;
    }

    function recursivelyMatchRestOfWord($word, $sample)
    {
        if ($word == '')
            return true;
        if ($sample == '')
            return false;
        if ($word{0} != $sample{0})
            return false;
        return $this->recursivelyMatchRestOfWord(substr($word, 1), substr($sample, 1));
    }
}
?>
