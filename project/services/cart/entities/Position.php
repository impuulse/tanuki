<?php

declare(strict_types=1);

namespace app\services\cart\entities;

/**
 * Class Position
 * @package app\services\cart\entities;
 * @property int $id
 * @property int $count
 */
class Position
{
    private int $id;
    private int $count;

    public function __construct(int $id, int $count)
    {
        $this->id = $id;
        $this->count = $count;
    }

    /**
     * @param int $id
     * @param int $count
     * @return Position
     */
    public static function create(int $id, int $count): Position
    {
        return new static($id, $count);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }
}