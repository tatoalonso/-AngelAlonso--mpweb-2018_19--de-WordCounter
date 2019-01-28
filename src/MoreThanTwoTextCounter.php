<?php

namespace Model;

class MoreThanTwoTextCounter implements Counter {
	public $content;
	public $counter;
	public $wordsMatched;

	public function __construct(Textcounter $counter) {
		$this->counter = $counter;
		$this->content = $this->counter->content();
		$this->searchTwoOrMore();
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

	public function searchTwoOrMore() {

		foreach ($this->content as $value) {
			if (strlen($value) > 2) {
				$this->wordsMatched[] = $value;
			}
		}

	}

};

?>
