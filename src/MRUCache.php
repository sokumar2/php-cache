<?php

namespace SK\Cache;

class MRUCache extends AbstractCache
{
    public function put(string $key, mixed $value): void
    {
        if (isset($this->cache[$key])) {
            $this->linkedList->removeByEntry($this->cache[$key]);

            $this->size--;
        } elseif ($this->size === $this->capacity) {
            $composite = $this->linkedList->removeFirst();

            unset($this->cache[$composite->key]);
            $this->size--;
        }

        $this->linkedList->addFirst(new Composite($key, $value));
        $this->cache[$key] = $this->linkedList->getFirst();

        $this->size++;
    }

}