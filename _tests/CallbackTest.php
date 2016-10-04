<?php declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use SevenPercent\Callback;

class CallbackTest extends TestCase {

	public function testWithFunctionNameString() {
		$this->assertTrue(is_callable(new Callback('strtoupper')));
	}

	public function testWithMethodNameString() {
		$this->assertTrue(is_callable(new Callback('DateTime::getTimestamp')));
	}

	public function testWithClassNameAndMethodNameArray() {
		$this->assertTrue(is_callable(new Callback(['DateTime', 'getTimestamp'])));
	}

	public function testWithInstanceAndMethodNameArray() {
		$this->assertTrue(is_callable(new Callback([new DateTime(), 'getTimestamp'])));
	}

	public function testWithClosure() {
		$this->assertTrue(is_callable(new Callback(function () {})));
	}

	public function testWithClassNameAndMethodNameArguments() {
		$this->assertTrue(is_callable(new Callback('DateTime', 'getTimestamp')));
	}

	public function testWithInstanceAndMethodNameArguments() {
		$this->assertTrue(is_callable(new Callback(new DateTime(), 'getTimestamp')));
	}
}
