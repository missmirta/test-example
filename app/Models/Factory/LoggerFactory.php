<?php

declare(strict_types = 1);

namespace App\Models\Factory;

use App\DTO\ConfigParams;
use App\Services\Logger\Contracts\LoggerInterface;
use App\Services\Logger\DatabaseLogger;
use App\Services\Logger\EmailLogger;
use App\Services\Logger\FileLogger;
use InvalidArgumentException;

class LoggerFactory
{
    public function createLogger(string $type, ConfigParams $config): LoggerInterface
    {
        return match ($type) {
            'email' => new EmailLogger($config->getEmail()),
            'file' => new FileLogger($config->getFilePath()),
            'database' => new DatabaseLogger(),
            default => throw new InvalidArgumentException("Logger type {$type} is not supported."),
        };
    }
}
