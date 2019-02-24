<?php

namespace Model\Filter;

interface Filter {

	public function filter(array $words): array;

};

?>
