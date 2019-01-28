<?php

namespace Model;

class VocalTwoCharacterCounter extends MoreThanTwoTextCounter implements Counter {

	public function __construct(VocalTextCounter $counter) {
		$this->counter = $counter;
		$this->content = $this->counter->wordsMatched();
		$this->searchTwoOrMore();
	}

};

?>
