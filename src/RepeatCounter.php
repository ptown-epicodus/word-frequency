<?php
class RepeatCounter
{
    function CountRepeats($word, $sample)
    {
        if ($sample == '')
            return false;
        return $word == $sample;
    }
}
?>
