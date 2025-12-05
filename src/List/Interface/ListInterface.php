<?php

namespace SK\Cache\List\Interface;

use SK\Collection\List\Entry;
use SK\Collection\List\Interface\ListInterface as BaseListInterface;

interface ListInterface extends BaseListInterface
{
    public function getFirst(): Entry;

    public function removeByEntry(Entry $entry): void;
}