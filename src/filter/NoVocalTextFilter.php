<?php

namespace Model\Filter;

class NoVocalTextFilter implements Filter {

	public $filter;

	public $wordsFiltered;

	public function __construct(Filter $filter) {
		$this->filter = $filter;
		$this->wordsFiltered = $this->filter();

	}

	public function filter():  ? array{
		$arrayVocal = array(
			"1" => "a",
			"2" => "e",
			"3" => "i",
			"4" => "o",
			"5" => "u",
		);

		foreach ($this->filter->wordsFiltered as $value) {

			if (!array_search(substr(strtolower($value), 0, 1), $arrayVocal)) {
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
