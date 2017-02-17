<?php
require_once 'src/RepeatCounter.php';

class RepeatCounterTest extends PHPUnit_Framework_TestCase
{
    function test_CountRepeats_emptyString()
    {
        //Arrange
        $test_RepeatCounter = new RepeatCounter;
        $word = 'foo';
        $text = '';

        //Act
        $result = $test_RepeatCounter->CountRepeats($word, $text);

        //Assert
        $this->assertSame(false, $result);
    }
}
?>
