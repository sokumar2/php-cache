<?php

namespace Tests\Cache;

use SK\Cache\Type;
use Tests\TestCase;
use SK\Cache\CacheFactory;
use SK\Cache\Interface\CacheInterface;
use PHPUnit\Framework\Attributes\DataProvider;

class MRUCacheTest extends TestCase
{
    public static function objectProvider(): array
    {
        return [
            [(new CacheFactory())->createInstance(3, Type::MRU)]
        ];
    }

    #[DataProvider('objectProvider')]
    public function testEviction(CacheInterface $cache): void
    {
        $cache->put(1, 1);
        $this->assertEquals(1, $cache->get(1));

        $cache->put(2, 2);
        $cache->put(3, 3);
        $cache->put(4, 4);

        $this->assertEquals(4, $cache->get(4));
        $this->assertEquals(1, $cache->get(1));
        $this->assertEquals(null, $cache->get(3));
    }
}