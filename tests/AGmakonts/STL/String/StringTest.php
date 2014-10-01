<?php
use AGmakonts\STL\String\String;
use AGmakonts\STL\Number\Natural;
require_once 'PHPUnit/Framework/TestCase.php';

/**
 * String test case.
 */
class StringTest extends PHPUnit_Framework_TestCase {
	

	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		


	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {

		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/**
	 * Tests String->__construct()
	 */
	public function test__construct() {
		// TODO Auto-generated StringTest->test__construct()
		$this->markTestIncomplete ( "__construct test not implemented" );
		
		$this->String->__construct(/* parameters */);
	}
	
	/**
	 * Tests String->uppercase()
	 */
	public function testUppercase() {
		// TODO Auto-generated StringTest->testUppercase()
		$this->markTestIncomplete ( "uppercase test not implemented" );
		
		$this->String->uppercase(/* parameters */);
	}
	
	/**
	 * Tests String->lowercase()
	 */
	public function testLowercase() {
		// TODO Auto-generated StringTest->testLowercase()
		$this->markTestIncomplete ( "lowercase test not implemented" );
		
		$this->String->lowercase(/* parameters */);
	}
	
	/**
	 * Tests String->reverse()
	 */
	public function testReverse() {
		// TODO Auto-generated StringTest->testReverse()
		$this->markTestIncomplete ( "reverse test not implemented" );
		
		$this->String->reverse(/* parameters */);
	}
	
	/**
	 * Tests String->simpleFormat()
	 */
	public function testSimpleFormat() {
		// TODO Auto-generated StringTest->testSimpleFormat()
		$this->markTestIncomplete ( "simpleFormat test not implemented" );
		
		$this->String->simpleFormat(/* parameters */);
	}
	
	/**
	 * Tests String->truncate()
	 */
	public function testTruncate() {
		
		$string = new String("Testing truncate method");
		
		$truncated = $string->truncate(new Natural(10))->getValue();
		
		self::assertEquals('Testing truncate', $truncated, "Actual: {$truncated}");
		
	}
	
	/**
	 * Tests String->compareTo()
	 */
	public function testCompareTo() {
		// TODO Auto-generated StringTest->testCompareTo()
		$this->markTestIncomplete ( "compareTo test not implemented" );
		
		$this->String->compareTo(/* parameters */);
	}
	
	/**
	 * Tests String->getLength()
	 */
	public function testGetLength() {
		// TODO Auto-generated StringTest->testGetLength()
		$this->markTestIncomplete ( "getLength test not implemented" );
		
		$this->String->getLength(/* parameters */);
	}
	
	/**
	 * Tests String->concat()
	 */
	public function testConcat() {
		// TODO Auto-generated StringTest->testConcat()
		$this->markTestIncomplete ( "concat test not implemented" );
		
		$this->String->concat(/* parameters */);
	}
	
	/**
	 * Tests String->substr()
	 */
	public function testSubstr() {
		// TODO Auto-generated StringTest->testSubstr()
		$this->markTestIncomplete ( "substr test not implemented" );
		
		$this->String->substr(/* parameters */);
	}
	
	/**
	 * Tests String->assertIsEmpty()
	 */
	public function testAssertIsEmpty() {
		// TODO Auto-generated StringTest->testAssertIsEmpty()
		$this->markTestIncomplete ( "assertIsEmpty test not implemented" );
		
		$this->String->assertIsEmpty(/* parameters */);
	}
	
	/**
	 * Tests String->getValue()
	 */
	public function testGetValue() {
		// TODO Auto-generated StringTest->testGetValue()
		$this->markTestIncomplete ( "getValue test not implemented" );
		
		$this->String->getValue(/* parameters */);
	}
	
	/**
	 * Tests String->__toString()
	 */
	public function test__toString() {
		// TODO Auto-generated StringTest->test__toString()
		$this->markTestIncomplete ( "__toString test not implemented" );
		
		$this->String->__toString(/* parameters */);
	}
	
	/**
	 * Tests String->getCharAtPosition()
	 */
	public function testGetCharAtPosition() {
		// TODO Auto-generated StringTest->testGetCharAtPosition()
		$this->markTestIncomplete ( "getCharAtPosition test not implemented" );
		
		$this->String->getCharAtPosition(/* parameters */);
	}
}

