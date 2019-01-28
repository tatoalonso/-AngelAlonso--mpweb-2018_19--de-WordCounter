<?php

namespace Model;

class KeyWordsVocalCounter extends KeyWordsCounter implements Counter {

	public function __construct(VocalTextCounter $counter) {
		$this->counter = $counter;
		$this->content = $this->counter->wordsMatched();
		$this->countKeyWords();

	}

};

?>
