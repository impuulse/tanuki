<?php

declare(strict_types=1);

namespace app\services\cart\handlers;

use app\services\cart\entities\Positions;
use app\services\cart\repositories\CartRepository;

class CalculationHandler
{
    private CartRepository $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    /**
     * @param Positions $positions
     * @return array
     */
    public function handle(Positions $positions): array
    {
        $data['total'] = 0;

        foreach ($positions->getData() as $position) {
            $price = $this->cartRepository->getProductPrice($position->getId());
            $sum = $price * $position->getCount();
            $data['positions'][] = [
                'id' => $position->getId(),
                'count' => $position->getCount(),
                'sum' => $sum
            ];
            $data['total'] += $sum;
        }

        return $data;
    }
}