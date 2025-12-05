<?php

namespace SK\Cache\List;

use SK\Collection\List\Entry;
use SK\Cache\List\Interface\ListInterface;
use SK\Collection\List\LinkedList as BaseLinkedList;

class LinkedList extends BaseLinkedList implements ListInterface
{
    public function getFirst(): Entry
    {
        return $this->first;
    }

    public function removeNode(Entry $entry): void
    {
        $this->removeEntry($entry);
    }

}
