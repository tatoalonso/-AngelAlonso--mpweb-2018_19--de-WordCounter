<?php

namespace Model;

class MoreThanTwoTextCounter implements Counter {
	private $content;

	private $counter;

	private $wordsNumber;

	public function __construct(Textcounter $counter) {
		$this->counter = $counter;
		$this->content = $this->counter->content();
		$this->countwords();
	}

	public function wordsNumber() {
		return $this->wordsNumber;
	}

	public function content() {
		return $this->content;
	}

	public function countwords() {

		$this->wordsNumber = 0;

		foreach ($this->content as $value) {
			if (strlen($value) > 2) {
				$this->wordsNumber = $this->wordsNumber + 1;
			}
		}

	}

};

?>
