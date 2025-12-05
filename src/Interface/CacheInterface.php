<?php

namespace SK\Cache\Interface;

interface CacheInterface
{
    public function getCapacity(): int;

    public function getSize(): int;

    public function get(string $key): mixed;

    public function put(string $key, mixed $value): void;

}