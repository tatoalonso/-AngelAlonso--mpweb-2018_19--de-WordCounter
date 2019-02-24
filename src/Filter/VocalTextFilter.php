<?php

namespace Model\Filter;

class VocalTextFilter  implements Filter  {

	public function filter(array $words): ? array{

		$arrayVocal = [
			"1" => "a",
			"2" => "e",
			"3" => "i",
			"4" => "o",
			"5" => "u",
		];

		foreach ($words as $value) {

			if (array_search(substr(strtolower($value), 0, 1), $arrayVocal)) {

				$wordsFiltered[] = $value;
			}
		}

		if (!isset($wordsFiltered)) {

			return array();
		}


		return $wordsFiltered;
	}

};

?>
