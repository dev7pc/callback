<?php declare(strict_types = 1);

namespace SevenPercent;

final class Callback {

	private $_callable;

	public function __construct($callable_or_class_or_object, $method = NULL) {
		$this->_callable = ($method === NULL && is_callable($callable_or_class_or_object)) ? $callable_or_class_or_object : [$callable_or_class_or_object, $method];
	}

	public function __invoke(...$parameters) {
		$callable = $this->_callable;
		return $callable(...$parameters);
	}
}
