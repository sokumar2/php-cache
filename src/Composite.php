<?php

namespace SK\Cache;

class Composite
{
    public function __construct(
        public readonly string $key,
        public readonly mixed $value
    ) {

    }

}