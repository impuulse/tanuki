<?php

declare(strict_types=1);

namespace app\services\cart\repositories;

use app\services\cart\caches\CartCache;
use app\services\cart\interfaces\CartInterface;
use app\services\cart\providers\PriceProvider;

class CartRepository implements CartInterface
{
    private CartCache $cartCache;
    private PriceProvider $priceProvider;

    public function __construct(CartCache $cartCache, PriceProvider $priceProvider)
    {
        $this->cartCache = $cartCache;
        $this->priceProvider = $priceProvider;
    }

    /**
     * @param int $id
     * @return float
     */
    public function getProductPrice(int $id): float
    {
        $price = $this->cartCache->getProductPrice($id);

        if (!$price) {
            /*
             * Сервис может быть недоступен, и лучше использовать брокер очередей
             * и организовать необходимое взаимодействие между сервисами.
             * Кеш необходимо обновлять, по событиям (при добавлении, изменении, удалении товара)
             * а не при получении новых данных тут.
             */
            $price = $this->priceProvider->get($id);
            $this->cartCache->setProductPrice($id, $price);
        }

        return $price;
    }
}