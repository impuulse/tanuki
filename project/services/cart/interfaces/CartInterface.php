<?php

declare(strict_types=1);

namespace app\services\cart\interfaces;

interface CartInterface {
    public function getProductPrice(int $id): float;
}
