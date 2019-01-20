<?php

namespace Model;

use Model\counter;

class nullcounter implements counter {
	private $content;

	private $wordsNumber;

	public function content() {
		return $this->content;
	}

	public function wordsNumber() {
		return $this->wordsNumber;
	}

	public function countwords() {
		$this->wordsNumber = 0;
	}

	public function __construct() {
		$this->content = NULL;
		$this->countwords();

	}

};

?>
