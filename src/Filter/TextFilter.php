<?php

namespace Model\Filter;


class TextFilter  {

    private $words;

	public function __construct(string $text) {

		$text = filter_var($text, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$this->words = $this->filterContent($text);

	}

	public function filter(): array{

		return $this->words;
	}


	private function filterContent(string $text) {

		$pattern = array("=", '+', '*', '/', ',', '.', ';', ':', '[', ']', '{', '}', '(', ')', '<', '>', '&', '%', '$', '@', '#', '^', '!', '?', '~');
		$contentFiltered = str_replace($pattern, "", $text);
		$contentFiltered = trim($contentFiltered);
		return explode(" ", $contentFiltered);

	}

};

?>
