<?php

namespace Model;

class VocalTextCounter implements Counter {
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

		foreach ($this->content as $value) {

			$arrayFirstLetter[] = substr(strtolower($value), 0, 1);
		}
		$arrayVocal = array("a", "e", "i", "o", "u");

		$this->wordsNumber = count(array_intersect($arrayFirstLetter, $arrayVocal));
	}

};

?>
