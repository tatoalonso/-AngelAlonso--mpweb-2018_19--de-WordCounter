<?php

namespace Model\Filter;

class Counter {
	private $filter;

	public function __construct(Filter $filter) {

		$this->filter = $filter;

	}

	public function countWords() {

		if ($this->filter->filter() == null) {
			return 0;
		} else {
			return count($this->filter->filter());
		}
	}

};

?>
