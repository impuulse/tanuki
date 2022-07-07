<?php

declare(strict_types=1);

namespace app\services\cart\entities;

use DomainException;
use InvalidArgumentException;

/**
 * Class Positions
 * @package app\services\cart\entities;
 */
class Positions
{
    /** @var $data Position[] */
    private array $data;

    public function __construct(array $positions)
    {
        $this->validateAndSet($positions);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $positions
     */
    private function validateAndSet(array $positions): void
    {
        if (empty($positions)) {
            throw new InvalidArgumentException('Positions is empty');
        }

        foreach ($positions as $position) {
            if (!isset($position['id'], $position['count'])) {
                throw new InvalidArgumentException('Position has wrong format');
            }

            $this->data[] = Position::create($position['id'], $position['count']);
        }
    }

    /**
     * @param array $data
     * @return Positions
     */
    public static function create(array $data): Positions
    {
        try {
            return new Positions($data);
        } catch (InvalidArgumentException $exception) {
            throw new DomainException($exception->getMessage());
        }
    }
}