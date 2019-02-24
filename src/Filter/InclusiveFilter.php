<?php

namespace Model\Filter;

class InclusiveFilter implements Filter {

    private $filters = array();

    public function __construct(Filter ...$filters )
    {
        $this->filters = $filters;

    }
    public function filter(array $words): array
    {
        foreach ($this->filters as $filter) {

	        $arrayWordsFiltered = $filter->filter($words);

	        foreach ($arrayWordsFiltered as $value) {

		        $wordsFiltered [] = $value;
	        }
        }

        if (!isset($wordsFiltered)) {

            return array();
        }
        return $wordsFiltered;
    }


};

?>
