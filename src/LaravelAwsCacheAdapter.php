<?php

namespace Arzeroid\LaravelAdapters;

use Aws\CacheInterface;
use Cache;

class LaravelAwsCacheAdapter implements CacheInterface
{

    public function get($key)
    {
        return Cache::get($key);
    }

    public function remove($key)
    {
        Cache::forget($key);
    }

    public function set($key, $value, $ttl = 0)
    {
        Cache::put($key, $value, $this->convertTtl($ttl));
    }

    /**
     * The AWS CacheInterface takes input in seconds, but the Laravel Cache classes use minutes. To support
     * this intelligently, we round up to one minute for any value less than 60 seconds, and round down to
     * the nearest whole minute for any value over one minute.
     *
     * @param $ttl
     * @return float|int
     */
    protected function convertTtl($ttl)
    {
        $minutes = floor($ttl / 60);

        if ($minutes == 0) {
            return 1;
        } else {
            return $minutes;
        }
    }
}
