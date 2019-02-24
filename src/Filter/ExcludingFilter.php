<?php


namespace Model\Filter;

class ExcludingFilter implements Filter {

    private $filters = array();

    public function __construct(Filter ...$filters )
    {
        $this->filters = $filters;

    }
    public function filter(array $wordsFiltered): array
    {
        foreach ($this->filters as $filter) {

            $wordsFiltered= $filter->filter($wordsFiltered);

        }
        return $wordsFiltered;
    }
}