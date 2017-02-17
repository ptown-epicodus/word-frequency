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

    function test_CountRepeats_equivalentStrings()
    {
        //Arrange
        $test_RepeatCounter = new RepeatCounter;
        $word = 'foo';
        $text = 'foo';

        //Act
        $result = $test_RepeatCounter->CountRepeats($word, $text);

        //Assert
        $this->assertSame(true, $result);
    }

    function test_CountRepeats_caseInsensitive()
    {
        //Arrange
        $test_RepeatCounter = new RepeatCounter;
        $word = 'fOO';
        $text = 'Foo';

        //Act
        $result = $test_RepeatCounter->CountRepeats($word, $text);

        //Assert
        $this->assertSame(true, $result);
    }

    function test_CountRepeats_embedded()
    {
        //Arrange
        $test_RepeatCounter = new RepeatCounter;
        $word = 'foo';
        $text = 'foo bar';

        //Act
        $result = $test_RepeatCounter->CountRepeats($word, $text);

        //Assert
        $this->assertSame(true, $result);
    }

    function test_CountRepeats_requiresWhitespace()
    {
        //Arrange
        $test_RepeatCounter = new RepeatCounter;
        $word = 'foo';
        $text = 'foobar';

        //Act
        $result = $test_RepeatCounter->CountRepeats($word, $text);

        //Assert
        $this->assertSame(false, $result);
    }

    function test_CountRepeats_requiresAnyPunctuation()
    {
        //Arrange
        $test_RepeatCounter = new RepeatCounter;
        $word = 'foo';
        $text = 'Foo.bar()';

        //Act
        $result = $test_RepeatCounter->CountRepeats($word, $text);

        //Assert
        $this->assertSame(true, $result);
    }
}
?>
