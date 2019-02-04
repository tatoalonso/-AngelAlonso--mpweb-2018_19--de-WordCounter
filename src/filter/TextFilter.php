<?php

namespace Model\Filter;

class TextFilter implements Filter {

	public $wordsFiltered;

	public function __construct(string $text) {
		$text = filter_var($text, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$this->wordsFiltered = $this->filterContent($text);
		//$this->filter();

	}

	public function filter(): array{
		return $this->wordsFiltered;
	}

	/*public function setContent($content) {
	$this->content = $content;
	}*/

	private function filterContent(string $text) {

		$pattern = array("=", '+', '*', '/', ',', '.', ';', ':', '[', ']', '{', '}', '(', ')', '<', '>', '&', '%', '$', '@', '#', '^', '!', '?', '~');
		$contentFiltered = str_replace($pattern, "", $text);
		$contentFiltered = trim($contentFiltered);
		return explode(" ", $contentFiltered);

	}

};

?>
