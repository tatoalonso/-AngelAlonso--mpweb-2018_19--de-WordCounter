<?php

namespace Model\Filter;

class MoreThanTwoTextFilter implements Filter {

	public $filter;

	public $wordsFiltered;

	public function __construct(Filter $filter) {
		$this->filter = $filter;
		$this->wordsFiltered = $this->filter();
	}

	public function filter():  ? array{

		foreach ($this->filter->wordsFiltered as $value) {
			if (strlen($value) > 2) {
				$words[] = $value;
			}
		}

		if (!isset($words)) {
			return null;
		}

		return $words;
	}

};

?>
