<?php

namespace SK\Cache;

use SK\Cache\Type as CacheType;
use SK\Cache\Interface\CacheInterface;

abstract class AbstractCacheFactory
{
    abstract public function createInstance(int $capacity, CacheType $type = CacheType::LRU): ?CacheInterface;

}
