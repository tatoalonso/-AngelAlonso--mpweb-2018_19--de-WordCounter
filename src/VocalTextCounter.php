<?php

namespace Model;

class VocalTextCounter implements Counter {
	private $content;
	private $counter;
	private $wordsMatched;

	public function __construct(Textcounter $counter) {
		$this->counter = $counter;
		$this->content = $this->counter->content();
		$this->countWordsVocal();
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

	public function countWordsVocal() {
		$arrayVocal = array(
			"1" => "a",
			"2" => "e",
			"3" => "i",
			"4" => "o",
			"5" => "u",
		);

		foreach ($this->content as $value) {

			if (array_search(substr(strtolower($value), 0, 1), $arrayVocal)) {
				$this->wordsMatched[] = $value;
			}
		}

	}

};

?>
