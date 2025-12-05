<?php

namespace SK\Cache\List;

use SK\Cache\List\LinkedList;
use SK\Collection\List\Interface\ListInterface;
use SK\Collection\List\LinkedListFactory as BaseLinkedListFactory;

class LinkedListFactory extends BaseLinkedListFactory
{
    public function createInstance(): ListInterface
    {
        return new LinkedList();
    }

}
