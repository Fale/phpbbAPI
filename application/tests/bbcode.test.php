<?php

class TestBBCode extends PHPUnit_Framework_TestCase {

	/**
	 * Test that a simple quote works properly
	 * @return void
	 */
	public function testSimpleQuote()
	{
        $cleaned = BBCode::toStdBBCode("[quote]");
		$this->assertEquals("[quote]", $cleaned);	
	}

}
