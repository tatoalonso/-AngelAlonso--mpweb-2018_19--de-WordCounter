<?php

namespace Model;

class Textcounter implements Counter {
	private $content;

	private $wordsNumber;

	public function wordsNumber() {
		return $this->wordsNumber;
	}

	public function content() {
		return $this->content;
	}

	public function filterContent(string $text) {

		$pattern = array("=", '+', '*', '/', ',', '.', ';', ':', '[', ']', '{', '}', '(', ')', '<', '>', '&', '%', '$', '@', '#', '^', '!', '?', '~');
		$contentFiltered = str_replace($pattern, "", $text);
		$contentFiltered = trim($contentFiltered);
		$this->content = explode(" ", $contentFiltered);

	}
	public function countwords() {

		$this->wordsNumber = count($this->content);
	}

	public function __construct(string $text) {
		$text = filter_var($text, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$this->filterContent($text);
		$this->countwords();

	}

};

?>
