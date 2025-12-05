<?php

namespace SK\Cache;

use SK\Cache\Interface\CacheInterface;

class CacheFactory extends AbstractCacheFactory
{
    public function createInstance(int $capacity): CacheInterface
    {
        return new LRUCache($capacity);
    }

}