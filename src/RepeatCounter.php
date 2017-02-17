<?php
class RepeatCounter
{
    function CountRepeats($word, $sample)
    {
        $word = strtolower($word);
        $sample = strtolower($sample);

        if ($sample == '')
            return false;
        return $word == $sample;
    }
}
?>
