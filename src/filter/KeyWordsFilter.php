<?php

namespace Model\Filter;

class KeyWordsFilter implements Filter {
	public $filter;

	public $wordsFiltered;

	public function __construct(Filter $filter) {
		$this->filter = $filter;
		$this->wordsFiltered = $this->filter();
	}

	public function filter():  ? array{
		$this->arrayKeyWords = array(
			"1" => "gañán",
			"2" => "palabrejas",
			"3" => "hiper-arquitecto",
			"4" => "que",
			"5" => "eh",
		);

		foreach ($this->filter->wordsFiltered as $value) {
			if (array_search(strtolower($value), $this->arrayKeyWords)) {
				$wordsMatched[] = $value;
			}
		}
		if (!isset($wordsMatched)) {
			return null;
		}

		return $wordsMatched;

	}

};

?>
