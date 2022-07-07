<?php

declare(strict_types=1);

namespace App\Controller;

use yii\log\Logger;

class ErrorHandler
{
    private Logger $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function handle(\DomainException $e): void
    {
        $this->logger->log($e->getMessage(), Logger::LEVEL_WARNING);
    }
}
