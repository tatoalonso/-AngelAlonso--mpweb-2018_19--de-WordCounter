<?php

namespace Model;

class KeyWordsCounter implements Counter {
	private $content;

	private $counter;

	private $wordsNumber;

	private $arrayKeyWords;

	public function __construct(Textcounter $counter) {
		$this->counter = $counter;
		$this->content = $this->counter->content();
		$this->arrayKeyWords = array(
			"1" => "gañán",
			"2" => "palabrejas",
			"3" => "hiper-arquitecto",
			"4" => "que",
			"5" => "eh",
		);
		$this->countwords();
	}

	public function wordsNumber() {
		return $this->wordsNumber;
	}

	public function content() {
		return $this->content;
	}

	public function countwords() {

		foreach ($this->content as $value) {
			if (array_search(strtolower($value), $this->arrayKeyWords)) {
				$this->wordsNumber = $this->wordsNumber + 1;
			}
		}
	}

};

?>
