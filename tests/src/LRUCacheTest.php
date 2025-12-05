<?php

namespace Tests\Cache;

use Tests\TestCase;
use SK\Cache\CacheFactory;
use SK\Cache\Interface\CacheInterface;
use PHPUnit\Framework\Attributes\DataProvider;

class LRUCacheTest extends TestCase
{
    public static function objectProvider(): array
    {
        return [
            [(new CacheFactory())->createInstance(3)]
        ];
    }

    #[DataProvider('objectProvider')]
    public function testCapacity(CacheInterface $cache): void
    {
        $this->assertEquals(3, $cache->getCapacity());
    }

    #[DataProvider('objectProvider')]
    public function testSize(CacheInterface $cache): void
    {
        $this->assertEquals(0, $cache->getSize());

        $cache->put(1, 1);
        $this->assertEquals(1, $cache->getSize());

        $cache->put(2, 2);
        $cache->put(3, 3);
        $this->assertEquals(3, $cache->getSize());

        $cache->put(4, 4);
        $this->assertEquals(3, $cache->getSize());
    }

    #[DataProvider('objectProvider')]
    public function testGet(CacheInterface $cache): void
    {
        $this->assertEquals(null, $cache->get(1));

        $cache->put(1, 1);
        $this->assertEquals(1, $cache->get(1));

        $cache->put(1, 10);
        $this->assertEquals(10, $cache->get(1));
    }

    #[DataProvider('objectProvider')]
    public function testEviction(CacheInterface $cache): void
    {
        $cache->put(1, 1);
        $this->assertEquals(1, $cache->get(1));

        $cache->put(2, 2);
        $cache->put(3, 3);
        $cache->put(4, 4);

        $this->assertEquals(null, $cache->get(1));
    }
}