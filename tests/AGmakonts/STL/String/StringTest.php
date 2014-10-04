<?php
use AGmakonts\STL\String\String;
use AGmakonts\STL\Number\Natural;
use AGmakonts\STL\Number\Integer;
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

	    $emptyString = new String();
	    $notEmptyString = new String("String");

	    self::assertTrue($emptyString->assertIsEmpty());
	    self::assertFalse($notEmptyString->assertIsEmpty());


	}

	/**
	 * Tests String->uppercase()
	 */
	public function testUppercase() {

	    $string = new String("string");

	    self::assertEquals('STRING', $string->uppercase()->getValue());

	}

	/**
	 * Tests String->lowercase()
	 */
	public function testLowercase() {

	    $string = new String("STRING");

	    self::assertEquals('string', $string->lowercase()->getValue());

	}

	/**
	 * Tests String->reverse()
	 */
	public function testReverse() {

	    $string = new String('qwerty');

	    self::assertEquals('ytrewq', $string->reverse()->getValue());

	}



	/**
	 * Tests String->truncate()
	 */
	public function testTruncate() {

		$string = new String("Testing truncate method");

		$truncated = $string->truncate(new Natural(20))->getValue();

		$withElipsis = $string->truncate(new Natural(20), new String("..."));

		self::assertEquals('Testing truncate', $truncated, "Actual: {$truncated}");
		self::assertEquals('Testing truncate...', $withElipsis, "Actual: {$withElipsis}");

	}



	/**
	 * Tests String->length()
	 */
	public function testLength() {

        $string = new String("abc");

        self::assertEquals(3, $string->length()->value());

	}

	/**
	 * Tests String->concat()
	 */
	public function testConcat() {

	    $string = new String('abc');
	    $secondString = new String('def');

	    self::assertEquals('abcdef', $string->concat($secondString)->getValue());

	}

	/**
	 * Tests String->substr()
	 */
	public function testSubstr() {

		$string = new String("qwerty");

		$substr = $string->substr(new Integer(0), new Integer(4));

		self::assertEquals('qwer', $substr->value(), "Actual: {$substr}");

	}

	/**
	 * Tests String->assertIsEmpty()
	 */
	public function testAssertIsEmpty() {

	    $emptyString = new String();
	    $notEmptyString = new String("String");

	    self::assertTrue($emptyString->assertIsEmpty());
	    self::assertFalse($notEmptyString->assertIsEmpty());


	}

	/**
	 * Tests String->value()
	 */
	public function testValue() {

	    $string = new String('abc');

	    self::assertEquals('abc', $string->value());

	}



	/**
	 * Tests String->getCharAtPosition()
	 */
	public function testCharAtPosition() {

		$string = new String("asdfghjkl");

		$char = $string->charAtPosition(new Natural(3));

		self::assertEquals('d', $char->getValue(), "Actual: {$char}");



	}
}

