<?php

namespace Model\Filter;

class KeyWordsFilter implements Filter {

	public function filter(array $words ):  ? array{

		$arrayKeyWords = array(

			"1" => "gañán",
			"2" => "palabrejas",
			"3" => "hiper-arquitecto",
			"4" => "que",
			"5" => "eh",
		);

		foreach ($words as $value) {

			if (array_search(strtolower($value), $arrayKeyWords)) {

				$wordsMatched[] = $value;
			}
		}
		if (!isset($wordsMatched)) {

			return array();
		}

		return $wordsMatched;

	}

};

?>
