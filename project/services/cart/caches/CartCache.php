<?php

declare(strict_types=1);

namespace app\services\cart\caches;

use yii\caching\DummyCache;

class CartCache
{
    const PRODUCT_KEY = 'product';
    private DummyCache $cache;

    public function __construct(DummyCache $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @param int $id
     * @return false|mixed
     */
    public function getProductPrice(int $id): ?float
    {
        $price = $this->cache->get(self::PRODUCT_KEY . $id);

        if ($price === false) {
            return null;
        }

        return $price;
    }

    /**
     * @param int $id
     * @param float $price
     * @return bool
     */
    public function setProductPrice(int $id, float $price): bool
    {
        return $this->cache->set(self::PRODUCT_KEY . $id, $price);
    }
}