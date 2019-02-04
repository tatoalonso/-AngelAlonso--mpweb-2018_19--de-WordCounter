<?php

namespace Model\Filter;

class FilterComposer implements Filter {

	public $filter1;
	public $filter2;

	public $wordsFiltered;

	public function __construct(Filter $filter1, Filter $filter2) {
		$this->filter1 = $filter1;
		$this->filter2 = $filter2;
		$this->wordsFiltered = $this->filter();

	}

	public function filter():  ? array{

		$arrayWords = array_merge($this->filter1->wordsFiltered, $this->filter2->wordsFiltered);

		if (!isset($arrayWords)) {
			return null;
		}

		return $arrayWords;
	}

};

?>
