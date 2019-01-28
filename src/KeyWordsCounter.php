<?php

namespace Model;

class KeyWordsCounter implements Counter {
	public $content;
	public $counter;
	public $wordsMatched;
	public $arrayKeyWords;

	public function __construct(Textcounter $counter) {
		$this->counter = $counter;
		$this->content = $this->counter->content();
		$this->countKeyWords();
	}

	public function wordsNumber() {
		if ($this->wordsMatched == null) {
			return 0;
		} else {
			return count($this->wordsMatched);
		}

	}

	public function wordsMatched() {
		return $this->wordsMatched;
	}

	public function countKeyWords() {
		$this->arrayKeyWords = array(
			"1" => "gañán",
			"2" => "palabrejas",
			"3" => "hiper-arquitecto",
			"4" => "que",
			"5" => "eh",
		);

		foreach ($this->content as $value) {
			if (array_search(strtolower($value), $this->arrayKeyWords)) {
				$this->wordsMatched[] = $value;
			}
		}

	}

};

?>
