<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\ConfigParams;
use App\Models\Factory\LoggerFactory;

class LoggerService
{
    public function __construct(private readonly LoggerFactory $factory)
    {
    }

    public function sendDefault(ConfigParams $params, string $message): void
    {
        $logger = $this->factory->createLogger($params->getDefaultLogger(), $params);
        $logger->send($message);
    }

    public function sendByLogger(ConfigParams $params, string $message, string $loggerType): void
    {
        $logger = $this->factory->createLogger($loggerType, $params);
        $logger->sendByLogger($message, $loggerType);
    }

    public function send(ConfigParams $params, string $message, string $loggerType): void
    {
        $logger = $this->factory->createLogger($loggerType, $params);
        $logger->send($message);
    }
}
