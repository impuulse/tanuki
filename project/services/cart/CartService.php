<?php

declare(strict_types=1);

namespace app\services\cart;

use app\services\cart\entities\Positions;
use app\services\cart\handlers\CalculationHandler;

class CartService
{
    private CalculationHandler $calculationHandler;

    public function __construct(CalculationHandler $calculationHandler)
    {
        $this->calculationHandler = $calculationHandler;
    }

    /**
     * @param array $data
     * @return array
     */
    public function calculate(array $data): array
    {
        $positions = Positions::create($data);

        return $this->calculationHandler->handle($positions);
    }
}