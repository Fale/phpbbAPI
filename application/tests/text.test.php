<?php

class TestText extends PHPUnit_Framework_TestCase {

	/**
	 * Test that a string to be excaped works properly
	 * @return void
	 */
	public function testString()
	{
        $cleaned = Text::toUTF8("è");
		$this->assertEquals("&egrave;", $cleaned);	
	}

}
