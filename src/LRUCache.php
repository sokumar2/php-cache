<?php

namespace SK\Cache;

use SK\Cache\List\LinkedListFactory;
use SK\Cache\Interface\CacheInterface;
use SK\Cache\List\Interface\ListInterface;

class LRUCache implements CacheInterface
{
    protected ListInterface $linkedList;

    protected array $cache = [];

    protected int $capacity;

    protected int $size = 0;

    public function __construct(int $capacity)
    {
        $this->capacity = $capacity;

        $this->linkedList = (new LinkedListFactory())->createInstance();
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function get(string $key): mixed
    {
        if (isset($this->cache[$key])) {
            $this->put($key, $this->cache[$key]->value->value);

            return $this->cache[$key]->value->value;
        }

        return null;
    }

    public function put(string $key, mixed $value): void
    {
        if (isset($this->cache[$key])) {
            $this->linkedList->removeByEntry($this->cache[$key]);

            $this->size--;
        } elseif ($this->size === $this->capacity) {
            $composite = $this->linkedList->removeLast();

            unset($this->cache[$composite->key]);
            $this->size--;
        }

        $this->linkedList->addFirst(new Composite($key, $value));
        $this->cache[$key] = $this->linkedList->getFirst();

        $this->size++;
    }

}