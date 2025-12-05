<?php

namespace SK\Cache;

use SK\Cache\Interface\CacheInterface;

class CacheFactory extends AbstractCacheFactory
{
    public function createInstance(int $capacity, Type $type = Type::LRU): ?CacheInterface
    {
        if (Type::LRU === $type) {
            return new LRUCache($capacity);
        } else if (Type::MRU === $type) {
            return new MRUCache($capacity);
        }

        return null;
    }

}