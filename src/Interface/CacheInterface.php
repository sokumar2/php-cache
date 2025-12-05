<?php

namespace SK\Cache\Interface;

interface CacheInterface
{
    /**
     * Return the value of the key if the key exists, otherwise return null.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key): mixed;

    /**
     * Update the value of the key if the key exists. Otherwise,
     * add the key-value pair to the cache.
     * If the number of keys exceeds the capacity from this operation,
     * evict the least recently used key.
     *
     * @param string $key
     * @param mixed $value
     *
     * @return void
     */
    public function put(string $key, mixed $value): void;

}