<?php

namespace Model;

class TwoCharacterKeyWordsVocalCounter extends MoreThanTwoTextCounter implements Counter {

	public function __construct(KeyWordsVocalCounter $counter) {
		$this->counter = $counter;
		$this->content = $this->counter->wordsMatched();
		$this->searchTwoOrMore();
	}

};

?>
