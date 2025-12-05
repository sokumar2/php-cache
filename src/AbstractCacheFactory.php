<?php

namespace SK\Cache;

use SK\Cache\Interface\CacheInterface;

abstract class AbstractCacheFactory
{
    abstract public function createInstance(int $capacity): CacheInterface;

}
