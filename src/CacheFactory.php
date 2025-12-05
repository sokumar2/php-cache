<?php

namespace SK\Cache;

use SK\Cache\Type as CacheType;
use SK\Cache\Interface\CacheInterface;

class CacheFactory extends AbstractCacheFactory
{
    public function createInstance(int $capacity, CacheType $type = CacheType::LRU): ?CacheInterface
    {
        if (CacheType::LRU === $type) {
            return new LRUCache($capacity);
        } else if (CacheType::MRU === $type) {
            return new MRUCache($capacity);
        }

        return null;
    }

}