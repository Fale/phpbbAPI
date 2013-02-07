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

    /**
	 * Test that a simple PHPbb quote works properly
	 * @return void
	 */
	public function testSimplePHPbbQuote()
	{
        $cleaned = BBCode::toStdBBCode("[quote:35s4h6he]");
		$this->assertEquals("[quote]", $cleaned);	
	}

    /**
	 * Test that a complex quote works properly
	 * @return void
	 */
	public function testComplexQuote()
	{
        $cleaned = BBCode::toStdBBCode("[quote=Fale]");
		$this->assertEquals("[quote=Fale]", $cleaned);	
	}

    /**
	 * Test that a complex PHPbb quote works properly
	 * @return void
	 */
	public function testComplexPHPbbQuote()
	{
        $cleaned = BBCode::toStdBBCode("[quote=Fale:35s4h6he]");
		$this->assertEquals("[quote=Fale]", $cleaned);	
	}

    /**
	 * Test that a closing PHPbb quote works properly
	 * @return void
	 */
	public function testComplexPHPbbQuote()
	{
        $cleaned = BBCode::toStdBBCode("[/quote:35s4h6he]");
		$this->assertEquals("[/quote]", $cleaned);	
	}
}
