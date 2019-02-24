<?php

namespace Model\Filter;

class MoreThanTwoTextFilter  implements Filter {

	public function filter(array $words):  array{

		foreach ($words as $value) {

			if (strlen($value) > 2) {

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
