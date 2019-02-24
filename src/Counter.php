<?php

namespace Model;

use Model\Filter\Filter;

class Counter {

	private $arrayWords;

	public function __construct(array $arrayWords) {

		$this->arrayWords = $arrayWords;

	}

	public function countWords() {

		if ($this->arrayWords == null) {

			return 0;

		} else {

			return count($this->arrayWords);

		}
	}

};

?>
