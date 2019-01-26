<?php

namespace Model;

class Textcounter {
	private $content;

	private $wordsNumber;

	public function wordsNumber() {
		return $this->wordsNumber;
	}

	public function content() {
		return $this->content;
	}
	public function countwords() {
		$content = $this->content;
		$pattern = array("=", '+', '*', '/', ',', '.', ';', ':', '[', ']', '{', '}', '(', ')', '<', '>', '&', '%', '$', '@', '#', '^', '!', '?', '~');
		$contentFiltered = str_replace($pattern, "", $content);
		$contentFiltered = trim($contentFiltered);
		$this->wordsNumber = count(explode(" ", $contentFiltered));
	}

	public function __construct(string $content) {
		$this->content = filter_var($content, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$this->countwords();

	}

};

?>
