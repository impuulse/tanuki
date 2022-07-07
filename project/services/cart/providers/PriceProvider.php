<?php

declare(strict_types=1);

namespace app\services\cart\providers;

class PriceProvider
{
    /**
     * @param int $productId
     * @return float
     */
    public function get(int $productId): float
    {
        return round(rand(1000, 10000) / 7.7, 2);
    }
}